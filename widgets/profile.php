<div id="member">
	<?php if(isset($_SESSION['username'])): ?>
		<p id="teem_title">PROFILE</p>
		<hr/>
		<div class="member_block">
			<p id="member_info">
				Username: <span id="name"><?php echo $_SESSION['username']; ?></span>
				<a id="undecorated_link" href = "index.php?logout=1"><button>Log out</button></a>
				<a id="undecorated_link" href = "change_password.php"><button>Change password</button></a>
				<?php if (isset($_SESSION['admin'])): ?>
					<br/>
					<a id="undecorated_link" href = "new.php"><button>Add new</button></a>
				<?php endif ?>
			</p>
		</div>
		<hr/>
	<?php endif ?>
</div>