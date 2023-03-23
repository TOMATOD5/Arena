<?php

class Mag extends Bojovnik
{

	protected $mana;

	public function __construct(string $jmeno, int $maxZivot, int $utok, int $obrana, protected int $maxMana, protected int $magickyUtok)
	{
		$this->mana = $maxMana;
		parent::__construct($jmeno, $maxZivot, $utok, $obrana);
	}

	public function utoc(Bojovnik $souper) : void
	{
		// Mana není naplněna
		if ($this->mana < $this->maxMana)
		{
			$this->mana += 10; // Přidáme trochu many
			if ($this->mana > $this->maxMana)
				$this->mana = $this->maxMana;
			parent::utoc($souper); // Zavoláme klasický útok
		}
		else // Magický útok
		{
			$uder = $this->magickyUtok + rand(1, 6);
			$this->nastavZpravu("$this->jmeno použil magii za $uder hp");
			$this->mana = 0; // Vynulování many po magickém útoku
			$souper->branSe($uder);
		}
	}

	public function __toString() : string
	{
		return $this->ukazatel($this->jmeno, 100, 15, $this->zivot, $this->maxZivot, 'red') .
			   $this->ukazatel('Mana', 100, 15, $this->mana, $this->maxMana, 'blue');
	}

} 