<?php

namespace Standings\Library;

use Symfony\Component\HttpFoundation\Request;

/**
 * @todo Eğer querystring varsa pagination bağlantılarının sonuna eklenecek.
 * @todo Request otomatik olarak yakalanacak.
 * @todo page değeri parametreye bağlanacak. Kullanıcı page yerine sayfa diyebilir.
 *
 * Eklendiği modele pagination yeteneği kazandırır. Doğrudan veritabanına bağlanmaz. Sadece sayfalama yapar.
 */
trait Pagination
{
    private int $totalRecords = 656;
    private int $totalPages = 0;
    private int $currentPage = 1;
    private int $limit = 10;
    private int $offset = 0;
    private array $pages = [];
    private string $url = '';
    private string $toHtml = '';

    private function setCurrentPage(int $currentPage): void
    {
        $page = (int)$currentPage;
        $this->currentPage = $page > 0 ? min($page, $this->totalPages) : 1;
    }

    private function setTotalPages() : void
    {
        $this->totalPages = ceil($this->totalRecords / $this->limit);
    }

    private function setTotalRecords(int $totalRecords = 0): void
    {
        $this->totalRecords = $totalRecords;
    }

    private function setOffset(): void
    {
        $this->offset = ($this->currentPage - 1) * $this->limit;
    }

    public function getPrevious(): int
    {
        return $this->currentPage - 1;
    }

    public function getNext(): int
    {
        $next = $this->currentPage + 1;
        return min($next, $this->totalPages);
    }

    public function getItems(): array
    {
        return [];
    }

    public function setUrl(string $url=''): void
    {
        $this->url = $url;
    }

    public function paginate(int $totalRecords=0, int $currentPage=1, string $url='')
    {
        $this->setUrl($url);
        $this->setTotalRecords($totalRecords);
        $this->setTotalPages();
        $this->setCurrentPage($currentPage);
        $this->setOffset();

        if($this->totalRecords <= $this->limit)
            return [];

        $this->pages['first'] = 1;
        $this->pages['previous'] = $this->getPrevious();
        $this->pages['current'] = $this->currentPage;
        $this->pages['next'] = $this->getNext();
        $this->pages['last'] = $this->totalPages;
        $this->pages['limit'] = $this->limit;
        $this->pages['offset'] = $this->offset;
        $this->pages['items'] = $this->getItems();
        $this->pages['toHtml'] = $this->toHtml();

        return $this->pages;
    }

    public function toHtml()
    {

        if($this->totalPages < 2)
            return $this->toHtml;

        $this->toHtml = '<nav class="pagination">';

        if($this->totalPages - $this->currentPage <= 2)
            $this->appendLink(1, false, '&laquo; İlk');

        for($i=$this->currentPage-2; $i<$this->currentPage;$i++)
        {
            if($i > 0)
                $this->appendLink($i, false);
        }

        $this->appendLink($this->currentPage, true);

        for($i=($this->currentPage+1); $i<=($this->currentPage+2); $i++)
        {
            if($i <= $this->totalPages)
                $this->appendLink($i, false);
        }

        if($this->totalPages - $this->currentPage >= 1)
            $this->appendLink($this->totalPages, false, 'Son &raquo;');


        $this->toHtml .= '</nav>';
        return $this->toHtml;
    }

    private function appendLink($page, $isActive, $label=null)
    {
        $this->toHtml .= '<a href="'.$this->url.'?page='.$page.'" class="pagination-item '.($isActive ? 'active' : '').'">' . ($label ?? $page) . '</a>';
    }



}