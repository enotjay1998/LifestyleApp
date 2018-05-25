<html lang='en'>
	<head>
		<title>My Dream Alarm Clock</title>
		<meta charset='UFT-8' name='viewport' content='width=device-width, initial=scale=1.0' >
		<link rel='stylesheet' type='text/css' href='clock.css'>
	</head>
	<body>
		<div id='main-container'>
			<h2 id='clock'></h2>
		</div>

		<div id='alarm-container'>
			<h3>Set Alarm Time</h3>
				<label>
					<div>
					<select id='alarmhrs' ></select>
					</div>
				</label>
				<label>
					<div>
					<select id='alarmmins' ></select>
					</div>
				</label>
				<label>
					<div>
					<select id='alarmsecs' ></select>
					</div>
				</label>
				<label>
					<div>
						<select id="ampm">
							<option value="AM">AM</option>
							<option value="PM">PM</option>
						</select>
					</div>
				</label>
				</div>

		<div id='buttonHolder'>
			<div>
				<button  id='setButton' onClick='alarmSet()'>Set Alarm</button>
			</div>

			<div>
				<button  id='clearButton' onClick='alarmClear()'>Clear Alarm</button>
			</div>
		</div>
		<script type="text/javascript" src="timer.js"></script>
	</body>
</html>