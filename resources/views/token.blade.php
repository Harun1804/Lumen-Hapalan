<center style="padding: 0.5rem; width: 100%; box-sizing: border-box; background-color: #FEFEFE;">
	<div style="border-top: 2px solid #7367F0; border-bottom: 2px solid #7367F0; padding: 1rem; text-align: left; box-sizing: border-box;">
		<h3>Hi {{ $data['name'] }},</h3>
		<p>
			Terima Kasih Atas Permintaannya<br><br>

			Ini adalah API Token Anda <br> <br>

            {{ $data['token'] }}
		</p>
	</div>

	<div style="padding: 0.5rem; box-sizing: border-box;">
		<p>Follow Me On:</p>
		<div>
			<a href="https://github.com/Harun1804" style="margin: 0.5rem 1rem;">
				Github
			</a>
		</div>
	</div>
</center>
