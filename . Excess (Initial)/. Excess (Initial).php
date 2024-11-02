<?php
	//require_once("");
?>

<?php
	class readFile {
		private string $name = "";
		private ?int $size = null;
		private ?array $content = null;

		function __construct(string $name) {
			$this->name = $name;
			$this->read();
		}

		private function read(): void {
			$file = null;
			$file = fopen($this->name, "r");
			if ($file) {
				$this->size = filesize($this->name);
				if ($this->size > 0) {
					$this->content = [];
					while (!feof($file)) {
						array_push($this->content, fgets($file));
					}
					fclose($file);
				}
			}
		}

		public function fromName(): string {
			return $this->name;
		}

		public function fromSize(): ?int {
			return $this->size;
		}

		public function fromContent(): ?array {
			return $this->content;
		}
	}

	class formatFile {
		private array $content = [];
		private ?array $form = null;

		function __construct(array $content) {
			$this->content = $content;
			$this->format();
		}

		private function format(): void {
			foreach ($this->content as $lineNumber => $line) {
				print $line;
				print "<br>";
			}
		}

		public function fromForm(): ?array {
			return $this->form;
		}
	}
?>

<?php
	try {
		$file1 = new readFile("./1. Left (Beyond)/1. Establish (Territory)/1. Establish (Territory).csv");
		$form1 = new formatFile($file1->fromContent());
		/*foreach ($form1->fromForm() as $lineNumber => $line) {
			print $line;
			print "<br>";
		}*/
	}
	catch (Exception $exception) {
		print $exception;
	}
?>