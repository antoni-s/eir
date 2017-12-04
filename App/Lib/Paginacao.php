<?php

namespace App\Lib;

class Paginacao
{
    private $totalPorPagina;
    private $totalLinhas;
    private $paginaSelecionada;

    public function __construct($resultado)
    {
        $this->totalLinhas          = $resultado['totalLinhas'];
        $this->totalPorPagina       = $resultado['totalPorPagina'];
        $this->paginaSelecionada    = $resultado['paginaSelecionada'];

    }

    public function criandoLink($buscaUnidade = "")
    {

        $quantidadePagina   = ceil( $this->totalLinhas / $this->totalPorPagina );
        $queryString        = (isset($buscaUnidade)) ? "&buscaUnidade=$buscaUnidade" : "";
        $primeiraPagina     = 1;


        $html          = '<div class="row">';
        $html         .= '<div class="col-md-12">';
				$html         .= '<nav aria-label="Page navigation">';
        $html         .= '<ul class="pagination justify-content-center">';
        $desabilita    = ( $this->paginaSelecionada == $primeiraPagina ) ? "disabled" : "";
        $html         .= "<li class='page-item $desabilita '>";
        $html         .= ( $this->paginaSelecionada == $primeiraPagina ) ? '<a class="page-link" href="#">Anterior </a>' : '<a class="page-link" href="http://'. APP_HOST . '/unidade/?paginaSelecionada=' . ( $this->paginaSelecionada - 1 ) . $queryString . '">Anterior </a>';
        $html         .= '</li>';

        $html .= '<li class="page-item active"><a class="page-link">'.$this->paginaSelecionada." de ".$quantidadePagina."</a></li>";

        $desabilita    = ( $this->paginaSelecionada == $quantidadePagina ) ? "disabled" : "";
        $html         .= "<li class='page-item  $desabilita  '>";
        $html         .= ( $this->paginaSelecionada == $quantidadePagina ) ? '<a class="page-link" href="#">Próxima</a>' : '<a class="page-link" href="http://'. APP_HOST . '/unidade/?paginaSelecionada=' . ( $this->paginaSelecionada + 1 ) . $queryString . '">Próxima</a>';
        $html         .= '</li>';
        $html         .= '</ul>';
				$html         .= '</nav>';
        $html         .= '</div>';
        $html         .= '</div>';

        return $html;
    }

    public static function criandoQuerystring($paginaSelecionada = "", $buscaUnidade = "")
    {
        $queryString  = (!empty($paginaSelecionada)) ? '?paginaSelecionada=' . $paginaSelecionada : '';
        $queryString .= (!empty($buscaUnidade)) ? '&buscaUnidade=' . $buscaUnidade : '';

        return $queryString;
    }

}
