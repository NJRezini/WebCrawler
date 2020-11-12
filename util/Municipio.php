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
        $detalhes = $this->capturarDetalhes($divNoticia);
        $noticia = $this->capturarTitulo($detalhes);
        $paragrafos = $this->getArrayNoticias($noticia);

        return $paragrafos;
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
                break;
            }
        }
        return $divsInternas;
    }

    private function capturarDivsNoticias($divsInternas)
    {
        foreach ($divsInternas as $divInterna) {
            $classeInterna = $divInterna->getAttribute('class');
            if ($classeInterna == 'td_module_10 td_module_wrap td-animation-stack') {
                $divNoticia = $divInterna->getElementsByTagName('div');
            }
        }
        return $divNoticia;
    }

    private function capturarDetalhes($divNoticia)
    {
        foreach ($divNoticia as $divInterna) {
            $classeInterna = $divInterna->getAttribute('class');

            if ($classeInterna == 'item-details') {
                $detalhes = $divInterna->getElementsByTagName('h3');
            }
        }
        return $detalhes;
    }

    

    private function capturarTitulo($detalhes)
    {
        foreach ($detalhes as $divInterna) {
            $classeInterna = $divInterna->getAttribute('class');

            if ($classeInterna == 'entry-title td-module-title') {
                $noticia = $divInterna->getElementsByTagName('a');
            }
        }
        return $noticia;
    }


    private function getArrayNoticias($noticia)
    {
        foreach ($noticia as $PInterno) {
            $arrayNoticias[] = $PInterno->nodeValue;
        }

        return $arrayNoticias;
    }
}
