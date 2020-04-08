<?php
namespace SimplecURL;

class Request extends AbstractRequest {

    public function send(): Response {
        $res = new Response;

        $ch = curl_init();
        $headers = [];
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->useragent);
        /** @see https://stackoverflow.com/a/41135574/9681396 */
        curl_setopt($ch, CURLOPT_HEADERFUNCTION,
            function($curl, $header) use (&$headers) {
                $len = strlen($header);
                $header = explode(':', $header, 2);
                if (count($header) < 2) return $len;

                $headers[strtolower(trim($header[0]))][] = trim($header[1]);

                return $len;
            }
        );
        if (!empty($this->headers)) curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

        switch($this->method) {
            case 'GET':     curl_setopt($ch, CURLOPT_HTTPGET, 1); break;
            case 'POST':    curl_setopt($ch, CURLOPT_POST, 1);
                            if (!empty($this->postfields)) curl_setopt($ch, CURLOPT_POSTFIELDS, $this->postfields);
                            break;
            default:        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->method);
        }
         
        if (!$body = curl_exec($ch)) {
            throw new HttpRequestException(curl_errno($ch) . ' - ' . curl_error($ch));
        }

        $res->setHeaders($headers);
        $res->setBody($body);

        curl_close($ch);

        return $res;
    }

}
