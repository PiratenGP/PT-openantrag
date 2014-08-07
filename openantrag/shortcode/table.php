<div class="pt-openantrag">
<div class="antragstabelle">
<div class="antrag head">
<div></div>
<div>Datum</div>
<div>Antrag</div>
</div>
<?php
	if (is_array($data) && (count($data) > 0)) {
		foreach ($data as $val) {
			$currentstep = end($val->ProposalSteps);
			echo "<a href=\"".$val->FullUrl."\" class=\"antrag\">";
			echo "<span class=\"stepcolor\" style=\"background-color:".$currentstep->ProcessStep->Color."\"></span>";
			echo "<span>".$val->CreatedAt."<br><span style=\"white-space:nowrap;color:".$currentstep->ProcessStep->Color."\">".$currentstep->ProcessStep->ShortCaption."</span></span>";
			echo "<span>".$val->Title."</span>";
			echo "</a>";
		}
	}
?>
</div>
</div>