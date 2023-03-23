<?php

class Bojovnik {

	protected $zivot;
	protected $zprava = '';

	public function __construct(public string $jmeno, protected int $maxZivot, protected int $utok, protected int $obrana)
	{
		$this->zivot = $maxZivot;
	}

	public function utoc(Bojovnik $souper) : void
	{
		$uder = $this->utok + rand(1, 6);
		$this->nastavZpravu("$this->jmeno útočí s úderem za $uder hp");
		$souper->branSe($uder);
	}


	public function branSe(int $uder) : void
	{
		$zraneni = $uder - ($this->obrana + rand(1, 6));
		if ($zraneni > 0)
		{
			$this->zivot -= $zraneni;
			$this->zprava = "$this->jmeno utrpěl poškození $zraneni hp";
			if ($this->zivot <= 0)
			{
				$this->zivot = 0;
				$this->zprava .= " a zemřel";
			}
		} else
			$this->zprava = "$this->jmeno odrazil útok";
	}

	public function nazivu() : bool
	{
		return ($this->zivot > 0);
	}


	protected function nastavZpravu(string $zprava) : void
	{
		$this->zprava = $zprava;
	}

	public function vratPosledniZpravu() : string
	{
		return $this->zprava;
	}

	protected function ukazatel(string $text, int $sirka, int $vyska, int $hodnota, int $maximum, string $barva) : string
	{
		return '
		<div style="border: 1px solid ' . $barva . '; width:' . ($sirka + 10) . 'px; height: ' . ($vyska + 10) . 'px;">
			<div style="background: ' . $barva . '; width:' .  round(($hodnota / $maximum) * $sirka) . 'px; height: ' . $vyska . 'px; color: white; padding: 5px;">' . htmlspecialchars($text) . '</div>
		</div>';
	}


	public function __toString() : string
	{
		return $this->ukazatel($this->jmeno, 100, 15, $this->zivot, $this->maxZivot, 'red');
	}
}