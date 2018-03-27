<?php

namespace CCC\Services;

use CCC\Contracts\DataQueryInterface;

class Paginate {

	public $totalItems;

    private static $_instance;
    private static $url;
    private $currentPage=1;
	private $totalPages=1;
	private $maxPages=3;
	private $perPage=15;
	private $d1=1;
	private $f1=3;
	private $d2;
	private $f2;
	private $icons;

    const TEXTEPRECEDENT	= '<',
        TEXTESUIVANT	    = '>',
        TEXTEDEBUT		    = '<<',
        TEXTEFIN		    = '>>',
        SEPARATOR		    = '<li class="disabled"><a href="#">...</a></li>';

    static function setBaseUrl($url='') {
	    self::$url = trim($url,'/');
	    $url_parsed = parse_url($url);
    	if(isset($url_parsed['query'])) {
		    self::$url .= '&';
	    } else {
		    self::$url .= '?';
	    }
        self::$url .= 'page=';
        if (self::$_instance === null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    static function setBaseUrlX($url='') {
	    self::$url = trim($url,'/') . '/page/';
        if (self::$_instance === null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

	/**
	 * @return Paginate
	 */
    static function getInstance() {
        return self::$_instance;
    }

    function setMaxPages($max='10') {
        $this->maxPages = $max;
        return $this;
    }

    function setPerPage($perPage=0) {
        $this->perPage = $perPage;
        return $this;
    }

    function currentPage($currentPage=1) {
        $this->currentPage = $currentPage;
        return $this;
    }

    function make(DataQueryInterface $items, $count = null, $icons=true) {
        $this->icons = $icons;
        if($count) {
        	$this->totalItems = $count;
        }
        else {
	        $this->totalItems  = $items->countSearch();
        }
        $this->totalPages = ceil($this->totalItems/$this->perPage);
        $this->f2 	= $this->totalPages;
        $this->d2 	= $this->f2 - 2;
        $offsetCalc = $this->currentPage - 1;
        $offset     = $this->perPage * ($offsetCalc < 0 ? 0 : $offsetCalc);
        return $items->offset($offset)
                ->take($this->perPage)
                ->get();
    }

    function back($back='',$first='') {
        if(!$this->icons) {
            $back	 = ' '.self::TEXTEPRECEDENT;
            $first = ' '.self::TEXTEDEBUT;
        }
        if($this->currentPage > 1) {
            return '<li><a href="'.self::$url.'1"><span class="fa fa-angle-double-left"></span>'.$first.'</a></li>
            <li><a href="'.self::$url.($this->currentPage - 1).'"><span class="fa fa-angle-left"></span>'.$back.'</a></li>';
        } else {
            return '<li class="disabled"><a href="#"><span class="fa fa-angle-double-left"></span>'.$first.'</a></li>
            <li class="disabled"><a href="#"><span class="fa fa-angle-left"></span>'.$back.'</a></li>
			';
        }
    }

    function next($next='',$last='') {
        if(!$this->icons) {
            $next = self::TEXTESUIVANT.' ';
            $last = self::TEXTEFIN.' ';
        }
        if($this->currentPage < $this->totalPages) {
            return '<li><a href="'.self::$url.($this->currentPage + 1).'">'.$next.'<span class="fa fa-angle-double-right"></span></a></li>
			<li><a href="'.self::$url.$this->totalPages.'">'.$last.'<span class="fa fa-angle-right"></span></a></li>';
        } else {
            return '<li class="disabled"><a href="#">'.$next.'<span class="fa fa-angle-double-right"></span></a></li>
			<li class="disabled"><a href="#">'.$last.'<span class="fa fa-angle-right"></span></a></li>';
        }
    }

    function links($form='',$to='') {
        $links = '';
        if($this->totalPages <= 10) {
            for($i=1;$i<=$this->totalPages;$i++) {
                $links .= $this->activeLink($i);
            }
        }
        else {
            $separator = self::SEPARATOR;
            if($this->currentPage > $this->f1 && $this->currentPage < $this->d2) {
                for($i=$this->currentPage-1;$i<=$this->currentPage+1;$i++) {
                    $separator .= $this->activeLink($i);
                }
                $separator .= self::SEPARATOR;
                $this->f1--;
                $this->d2++;
            }
            elseif($this->currentPage == $this->f1) $this->f1++;
            elseif($this->currentPage == $this->d2) $this->d2--;

            for($i=$this->d1;$i<=$this->f1;$i++) {
                $links .= $this->activeLink($i);
            }
            $links .= $separator;
            for($i=$this->d2;$i<=$this->f2;$i++) {
                $links .= $this->activeLink($i);
            }
        }
        return $links;
    }

    function generate() {
        if($this->totalItems > $this->perPage) {
            $start = ($this->icons) ? null : ' Début';
            $end 	 = ($this->icons) ? null : 'Fin ';
            $paginate = '<nav class="paginator">
				<ul class="pagination">';
            $paginate .= $this->back();
            $paginate .= $this->links();
            $paginate .= $this->next();
            $paginate .= '</ul>
			</nav>';
            return $paginate;
        }
        return '';
    }

    function activeLink($i) {
        if($this->currentPage == $i){
            return '<li class="active"><a href="#">'.$i.'</a></li>';
        }
        return '<li><a href="'.self::$url.$i.'">'.$i.'</a></li>';
    }
}
