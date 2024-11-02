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
				$temporary = [];
				foreach (explode(",", $line) as $element) {
					//array_push($this->content, fgets($file));
				}
			}
			print "<br>";
		}

		public function fromForm(): ?array {
			return $this->form;
		}
	}
?>

<?php
	$list = [
		"./1. Left (Beyond)/1. Establish (Territory)/pocketAccount51 - 1. Establish (Territory).csv",
		"./1. Left (Beyond)/2. Exchange (Statement)/pocketAccount51 - 2. Exchange (Statement).csv",
		"./1. Left (Beyond)/3. Instruction (Template)/pocketAccount51 - 3. Instruction (Template).csv",
		"./1. Left (Beyond)/4. Prove (Harmony)/pocketAccount51 - 4. Prove (Harmony).csv"
	];
	try {
		foreach ($list as $value) {
			$file = new readFile($value);
			$form = new formatFile($file->fromContent());
			/*foreach ($form->fromForm() as $lineNumber => $line) {
				print $line;
				print "<br>";
			}*/
		}
	}
	catch (Exception $exception) {
		print $exception;
	}
?>