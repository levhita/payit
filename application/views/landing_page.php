<div class="container">
	<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="jumbotron">
		<h1>PayIt!</h1>
		<p>Hosting an event?, Giving away a book? Giving free IceCream? Don't let it go unnoticed and make them pay with a twit.</p>
		<p>PayIt allows you make your users twit about you in order gain the freebies you are giving, helping virality and leaving you with a nice Database for future Digital Maketing Efforts.</p>
		<p>
			<button class="btn btn-primary btn-lg" id="openModalButton">
				Create a new Campaign Now!
			</button>
		</p>	
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="campaignModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">New Campaign</h4>
			</div>
			<div class="modal-body">
				<form role="form">
					<div class="form-group">
						<label for="nameInput">Campaign Name</label>
						<input type="text" class="form-control" id="nameInput" placeholder="Ex: Awesome Campaign"/>
					</div>
					<div class="form-group">
						<label>Campaign Template</label><br/>
						<div id="templateRadio" class="btn-group" data-toggle="buttons">
							<label class="btn btn-default active">
								<input type="radio" name="templateRadio" value="event"> Promote a Event</input>
							</label>
							<label class="btn btn-default">
								<input type="radio" name="templateRadio" value="freebie">Giving a Freebie</input>
							</label>
							<label class="btn btn-default">
								<input type="radio" name="templateRadio" value="blank">Blank Campaign</input>
							</label>
						</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button id="saveButton" type="button" class="btn btn-primary">Go!</button>
			</div>
		</div>
	</div>
</div>

<script src="/js/landing.js"></script>