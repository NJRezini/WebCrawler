<?php

class Municipio
{

    private $url;
    private $proxy;
    private $dom;
    private $html;

    public function __construct()
    {
        $this->url = 'https://omunicipio.com.br/noticia/seguranca/';
        $this->proxy = '10.1.21.254:3128';
        $this->dom = new DOMDocument();
    }

    public function getParagrafos()
    {
        $this->carregarHtml();
        $divsGeral = $this->capturarTagsDivGeral();
        $divsInternas = $this->capturarDivsInternasPageContent($divsGeral);
        $divNoticia = $this->capturarDivsNoticias($divsInternas);
        $imagens = $this->capturarDetalhesImagem($divNoticia);
        $detalhes = $this->capturarDetalhesTitulo($divNoticia);
        $imagem = $this->capturarImagem($imagens);
        $noticia = $this->capturarTitulo($detalhes);
        return $noticia;
    }

    private function getContextConexao()
    {
        $arrayConfig = array(
            'http' => array(
                'proxy' => $this->proxy,
                'request_fulluri' => true
            ),
            'https' => array(
                'proxy' => $this->proxy,
                'request_fulluri' => true
            )
        );
        $context = stream_context_create($arrayConfig);
        return $context;

    }

    private function carregarHtml()
    {
        $context = $this->getContextConexao();
        $this->html = file_get_contents($this->url, false, $context);

        libxml_use_internal_errors(true);

        $this->dom->loadHTML($this->html);
        libxml_clear_errors();
    }

    private function capturarTagsDivGeral()
    {
        $tagsDiv = $this->dom->getElementsByTagName('div');
        return $tagsDiv;
    }

    private function capturarDivsInternasPageContent($divsGeral)
    {
        $divsInternas = null;
        foreach ($divsGeral as $div) {
            $classeInterna = $div->getAttribute('class');
            if ($classeInterna == 'td-ss-main-content') {
                $divsInternas = $div->getElementsByTagName('div');
            }
        }
        return $divsInternas;
    }

    private function capturarDivsNoticias($divsInternas)
    {
        $divNoticia = [];
        foreach ($divsInternas as $divInterna) {
            $classeInterna = $divInterna->getAttribute('class');
            if ($classeInterna == 'td_module_10 td_module_wrap td-animation-stack') {
                $divNoticia[] = $divInterna->getElementsByTagName('div');
            }
        }
        return $divNoticia;
    }

    private function capturarDetalhesTitulo($divNoticia)
    {
        $detalhes = [];
        foreach ($divNoticia as $divInterna) {
            foreach($divInterna as $titulo){
                $classeInterna = $titulo->getAttribute('class');
    
                if ($classeInterna == 'item-details') {
                    $detalhes[] = $titulo->getElementsByTagName('h3');
                }
            }
        }
        return $detalhes;
    }


    private function capturarTitulo($detalhes)
    {
        $noticia = [];
        foreach ($detalhes as $divInterna) {
            foreach ($divInterna as $div) {
                $classeInterna = $div->getAttribute('class');
                
                if ($classeInterna == 'entry-title td-module-title') {
                    $noticia[] = $div->nodeValue;
                }
            }
        }
        return $noticia;
    }
    
    private function capturarDetalhesImagem($divNoticia)
    {
        $imagens = [];
        foreach ($divNoticia as $divInterna) {
            foreach($divInterna as $imagem){
                $classeInterna = $imagem->getAttribute('class');
                
                if ($classeInterna == 'td-module-thumb') {
                    $imagens[] = $imagem->getElementsByTagName('img');
                }
            }
        }
        return $imagens;
    }

    private function capturarImagem($imagens)
    {
        $imagepaths = [];
        foreach ($imagens as $imageTags) {
            foreach ($imageTags as $tags) {
                $imagepaths[] = $tags->getAttribute('src');
            }
        }
        return $imagepaths;
    }
}