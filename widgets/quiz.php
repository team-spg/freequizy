<div class="block">
	<?php if (sizeof($question) == 0): ?>
		<p id="warning_message">
			Quiz "<?php echo str_replace('_', ' ', $quiz); ?>" has no questions yet!
		</p>
	<?php endif ?>
	<?php if (sizeof($question) > 0): ?>
		<div class="quiz">
			<hr/>
			<p id="number">1. </p><p id = "question">This is a sample text question</p>
			<ul>
				<label><li><input id = "radio_a" type = "radio" name = "variant" onclick="choose();"/><p id="letter"> A) </p><p id = "variant_a"> variant a is something ... </p></li></label>
				<label><li><input id = "radio_b" type = "radio" name = "variant" onclick="choose();"/><p id="letter"> B) </p><p id = "variant_b"> variant b is something ... </p></li></label>
				<label><li><input id = "radio_c" type = "radio" name = "variant" onclick="choose();"/><p id="letter"> C) </p><p id = "variant_c"> variant c is something ... </p></li></label>
				<label><li><input id = "radio_d" type = "radio" name = "variant" onclick="choose();"/><p id="letter"> D) </p><p id = "variant_d"> variant d is something ... </p></li></label>
			</ul>
			<hr/>
		</div>
		<?php if (sizeof($question) > 1): ?>
			<div class="controls">
				<ul>
					<li><button id="btn_first" onclick="first();"><<</button></li>
					<li><button id="btn_previous" onclick="previous();"><</button></li>
					<?php if (sizeof($question) > 1 && sizeof($question) < 3): ?>
						<li><button id="btn_one">1</button></li>
						<li><button id="btn_two">2</button></li> 
					<?php elseif(sizeof($question) >= 3): ?>
						<li><button id="btn_one" onclick="one();">1</button></li>
						<li><button id="btn_two" onclick="two();">2</button></li>
						<li><button id="btn_three" onclick="three();">3</button></li>
					<?php endif ?>
					<li><button id="btn_next" onclick="next();">></button></li>
					<li><button id="btn_last" onclick="last();">>></button></li>
				</ul>
				<?php if (sizeof($question) > 3): ?>
					<ul>
						<li><input id="page_number" type="text" size="3"/></li> 
						<li><button id="btn_go_to" onclick="go_to();">Go to</button></li>
					</ul>
				<?php endif ?>
			</div>
		<?php endif ?>
	<?php endif ?>
</div>
