<?php
	
	class extension_symreload extends Extension {

		private $page = null;
		
	/*-------------------------------------------------------------------------
		Delegates:
	-------------------------------------------------------------------------*/
		
		public function getSubscribedDelegates() {
			return array(
				array(
					'page'		=> '/frontend/',
					'delegate'	=> 'FrontendOutputPostGenerate',
					'callback'	=> '__addScripts'
				),
				array(
					'page'		=> '/frontend/',
					'delegate'	=> 'FrontendPageResolved',
					'callback'	=> '__setPage'
				)
			);
		}
		
		public function __addScripts($context) {
			$output = $context['output'];

			$html = '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>';
			$html .= '<script src="' . URL . '/extensions/symreload/assets/symreload.js" type="text/javascript"></script>';
			$html .= '</head>';

			return $context['output'] = str_replace('</head>', $html, $output); 
		}
		
		public function __setPage($context) {
			$page = $context['page_data']['filelocation'];

			$cookie = new Cookie(
				'symreload', TWO_WEEKS, __SYM_COOKIE_PATH__, null, true
			);
			$cookie->set('page', $page);
		}
	}
	
?>