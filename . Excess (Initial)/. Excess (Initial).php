<?php
	require_once("spreadsheetReader/excel_reader2.php");
	require_once("spreadsheetReader/excel_reader2.php");
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
?>