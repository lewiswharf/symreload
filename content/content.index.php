<?php

	if(!defined("__IN_SYMPHONY__")) die("<h2>Error</h2><p>You cannot directly access this file</p>");

	require_once(TOOLKIT . '/class.page.php');
	require_once(EXTENSIONS . '/symreload/extension.driver.php');

	Class contentExtensionSymReloadIndex extends Page  {

		public function view() {

		    $files = $_POST['files'];

		    if ($page = $_SESSION['symreload']['page']) {
		    	$files[] = array('src' => $page, 'mod' => 0);
		    	
		    	$utilities = General::listStructure(UTILITIES, array('xsl'), false, 'asc', UTILITIES);
		    	if ($utilities['filelist']) {
					foreach ($utilities['filelist'] as $key => $value) {
				    	$files[] = array('src' => UTILITIES . '/' . $value, 'mod' => 0);
					}
		    	}
		    }
	        
		    $output = array();
		    $output['files'] = array();

		    $output['reload'] = false;
		    foreach($files as $file){
		        $time = $this->__getFileTime($file['src']);
		        if($file['mod']){ 
		            if($time != $file['mod'] && $time){
		                $output['reload'] = true;
		            }
		        }
		        $output['files'][] = array('src' => $file['src'], 'mod' => $time);
		    }
			$this->_Result = json_encode($output);
		}

		public function generate(){
			header('Content-Type: application/json');

			$this->view();

			echo $this->_Result;
			exit;
		}

		/**
		 * Dummy method to be compatible with normal Administration pages
		 */
		public function build() {
			return $this->generate();
		}

		private function __getFileTime($src){
		    $url = str_replace(URL, DOCROOT, $src);
		    if(file_exists($url)){
		        return filemtime($url);
		    }
		    return 0;
		}
	}
