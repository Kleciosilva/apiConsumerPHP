<?php
class APIConsumer
{
    private $base_url;

    public function __construct($base_url)
    {
        $this->base_url = $base_url;
    }

    public function create($data)
    {
        $url = $this->base_url;
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/json',
                'content' => json_encode($data)
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return json_decode($result, true);
    }

    public function read($id = null)
    {
        $url = $this->base_url . ($id ? "/$id" : '');
        $result = file_get_contents($url);
        return json_decode($result, true);
    }

    public function update($id, $data)
    {
        $url = $this->base_url . "/$id";
        $options = [
            'http' => [
                'method' => 'PUT',
                'header' => 'Content-Type: application/json',
                'content' => json_encode($data)
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return json_decode($result, true);
    }

    public function delete($id)
    {
        $url = $this->base_url . "/$id";
        $options = [
            'http' => [
                'method' => 'DELETE'
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return json_decode($result, true);
    }
}
