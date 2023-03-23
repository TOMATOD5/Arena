<?php

class Arena {

	public function __construct(private Bojovnik $bojovnik1, private Bojovnik $bojovnik2) {}

	//boje fajterů
	public function zapas() : void
	{
		// pořadí fajteru
		$b1 = $this->bojovnik1;
        $b2 = $this->bojovnik2;
        echo("<h1>Vítejte v aréně!</h1>");
        echo("<p>Dnes se utkají $b1->jmeno s $b2->jmeno!</p>");
        // prohození bojivníků
        $zacinaBojovnik2 = rand(0, 1);
        if ($zacinaBojovnik2) {
			$b1 = $this->bojovnik2;
			$b2 = $this->bojovnik1;
		}
        echo("<p>Začínat bude bojovník $b1->jmeno!<br />Zápas může začít...</p>");

        // cyklus boje v aréně
		while ($b1->nazivu() && $b2->nazivu())
		{
			$b1->utoc($b2);
			$this->vypisBojovniky($b1, $b2);

			if ($b2->nazivu()) // Druhý fajter útočí jen tehdy, když útok přežil
			{
				$b2->utoc($b1);
				$this->vypisBojovniky($b2, $b1);
			}
		}
    }

	private function vypisBojovniky($b1, $b2) : void
	{
		echo('<hr /><p>');
		echo($b1->vratPosledniZpravu()); // zpráva o útoku
		echo('<br />');
		echo($b2->vratPosledniZpravu()); // zpráva o obraně
		echo('</p>' . $this->bojovnik1 . '<br />' . $this->bojovnik2); // Výpis bojovníků
    }
}