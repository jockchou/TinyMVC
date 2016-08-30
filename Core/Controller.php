<?php

class Controller
{
	private $template = null;
	private $tplData = [];
	private $isRendered = false;

	public function assign($name, $value)
	{
		if (is_object($value)) {
			$this->tplData[$name] = $value->fill();
		} else {
			$this->tplData[$name] = $value;
		}
	}

	public function render($viewFile, $viewData = null)
	{
		if ($this->isRendered) return false;

		$viewFile = V_PATH . $viewFile;
		if (file_exists($viewFile)) {
			$this->template = new Template($viewFile);
			if (is_array($viewData) && count($viewData) > 0) {
				$this->tplData = array_merge($this->tplData, $viewData);
			}
			foreach ($this->tplData as $key => $val) {
				$this->template->set($key, $val);
			}
			echo $this->template->fill();
		} else {
			throw new Exception("Template file " . $viewFile . " is not exists!");
		}
		$this->isRendered = true;
		return false;
	}
}