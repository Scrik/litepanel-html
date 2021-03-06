<?php
/*
* @LitePanel
* @Version: 1.0.1
* @Date: 29.12.2012
* @Developed by QuickDevel
*/
class indexController extends Controller {
	private $limit = 20;
	public function index($page = 1) {
		$this->load->checkLicense();
		$this->document->setActiveSection('news');
		$this->document->setActiveItem('index');

		$this->load->library('pagination');
		$this->load->model('news');
		
		$userid = $this->user->getId();
		
		$sort = array(
			//'ticket_status'		=> 'DESC',
			'news_date_add'	=> 'DESC'
		);
		
		$options = array(
			'start'		=>	($page - 1) * $this->limit,
			'limit'		=>	$this->limit
		);
		
		#$total = $this->ticketsModel->getTotalTickets(array('user_id' => (int)$userid));
		$tickets = $this->newsModel->getNews(array('user_id' => (int)$userid), array(), $sort, $options);
		
		$paginationLib = new paginationLibrary();
		
		$paginationLib->total = $total;
		$paginationLib->page = $page;
		$paginationLib->limit = $this->limit;
		$paginationLib->url = $this->config->url . 'tickets/index/index/{page}';
		
		$pagination = $paginationLib->render();
		
		$this->data['tickets'] = $tickets;
		$this->data['pagination'] = $pagination;
		
		$this->getChild(array('common/header', 'common/footer'));
		return $this->load->view('news/index', $this->data);
	}
}
?>
