<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


    <style>
		.main-container {
			background-image:url('../public/images/IMG/invoice-background.jpg');
			background-size:cover;
			width: 800px;
			min-height:1122px;
			margin: auto;
			font-family: "Roboto";
			/* border: 1px solid #eee; */
		}
      	.invoice-box {
			/* margin: auto; */
			padding: 30px;
			padding-bottom:10px;
			
		}

		.invoice-box table {
			width: 100%;
			line-height: inherit;
			text-align: left;
			margin-top: 17px;
		}

		.invoice-box table td {
			padding: 5px;
			vertical-align: top;
		}

		.invoice-box table tr td:nth-child(2) {
			text-align: left;
		}

		.invoice-box table tr.top table td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.top table td.title {
			font-size: 45px;
			line-height: 45px;
			color: #333;
		}

		.invoice-box table tr.information table td {
			padding-bottom: 10px;
		}

		.invoice-box table tr.heading td {
			background: #eee;
			border-bottom: 1px solid #ddd;
			font-weight: bold;
		}

		.invoice-box table tr.details td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.item td {
			border-bottom: 1px solid #eee;
		}

		.invoice-box table tr.item.last td {
			border-bottom: none;
		}

		.invoice-box table tr.total td:nth-child(2) {
			border-top: 2px solid #eee;
			font-weight: bold;
		}
		.invoice_date {
			text-align:center !important;
		}
		.hospital_data {
			display: flex;
			justify-content: flex-end;
		}
		.invoice-table .description {
			width: 100%;
		}
		.invoice-table table th, .invoice-table table td {
			text-align:center;
			
		}
		.invoice-table table th {
			padding: 6px;
		}
		/* .invoice-table table .details {
			height: 300px;
		} */
		.invoice-table th, .invoice-table td {
			border-left: 1px solid black;
			border-top: 1px solid black;
			border-bottom: 1px solid black;
			border-collapse: collapse;
		}
		.invoice-table td {
			padding: 10px;

		}
		.border-none td {
			border-top:none;
			border-bottom:none;
		}
		@page { margin: 0px; }
		body { margin: 0px; }
		html { margin: 0px}

    </style>
  </head>
  <body>
	<div class="main-container" style="position:relative;">
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title"  >
									<img src="{{$sewapartner->profile}}" style="width: 15%; margin-left: 85%; margin-bottom: -40px;" />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="3">
						<table style="height:200px;">
							<tr>
								<td class="patient_data" >
									<div class="details" style="width: 200px;">
										<h4 style="font-size: 1.1rem;">{{$cardholder->name}}</h4>
										<span>{{$cardholder->address}}</span><br><br>
										
										<span><b>{{$cardholder->contact_number}}</b></span><br>
										<!-- <span><b>manpreetsingh@gmail.com</b></span> -->
									</div>
								</td>
								<td class="invoice_date">
									<h5>INVOICE</h5>
									<span><b>Date: {{Carbon\Carbon::parse($data->created_at)->format('d/m/y')}}</b></span><br />
								</td>
								<td class="hospital_data">
									<div class="details" style="text-align:right !important; width: 200px; float:right;">
										<h6><b>{{$sewapartner->name}}</b></h6>
										<span>{{$sewapartner->sewa_address}}</span><br><br>
										<!-- <span>
											Model Town,  Near Ravidas Chowk, 
											Beside Pritam Hospital,
											Jalandhar 144401
										</span><br><br> -->
										<span><b>{{$sewapartner->contactnumber}}</b></span><br>
										<span><b>{{$sewapartner->email}}</b></span>
									</div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div class="invoice-table">
			<table class="description">
					
				<tr class="heading">
					<th style="width:50px; border-left:none;">S. No</th>
					<th style="width:200px; text-align:left;"><span style="margin-left: 5px;">Description</span></th>
					<th style="width:20px;">Fees</th>
					<th style="width:20px;">Discount</th>
					<th style="width:20px;">Amount</th>
				</tr>

				<tr class="details">
					<td  style="border-left:none; border-bottom: none;"><b>1.</b></td>

					<td  style="text-align:left; border-bottom: none;"><span style="margin-left: 5px;">{{$data->description}}</span></td>
					<td style="border-bottom: none;">Rs{{$data->charges}}</td>
					<td style="border-bottom: none;">Rs{{$data->discount}}</td>
					<td style="border-bottom: none;">Rs{{$data->balance}}</td>
				</tr>
				<tr class="border-none">
					<td style="border-left: none;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="border-none">
					<td style="border-left: none;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				
				<tr class="border-none">
					<td style="border-left: none;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="border-none">
					<td style="border-left: none;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="border-none">
					<td style="border-left: none;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="border-none">
					<td style="border-left: none;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="border-none">
					<td style="border-left: none;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="border-none">
					<td style="border-left: none;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="border-none">
					<td style="border-left: none;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="border-none">
					<td style="border-left: none;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="border-none">
					<td style="border-left: none;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="border-none">
					<td style="border-left: none;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="border-none">
					<td style="border-left: none;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="border-none">
					<td style="border-left: none;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="border-none">
					<td style="border-left: none;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="border-none">
					<td style="border-left: none;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="border-none">
					<td style="border-left: none;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td style="border: none;"></td>
					<td style="border-top: none;"></td>

					<td style="text-align:center; padding: 10px;"><b>Subtotal</b></td>
					<td></td>
					<td>Rs{{$data->charges}}</td>

				</tr>
				<tr>
					<td style="border-left:none;"></td>
					<td style="text-align:right;">
						<h5><b>Total</b></h5>
					</td>
					<td></td>
					<td></td>
					<td>Rs{{$data->balance}}</td>
				</tr>
			</table>
		</div>
		<div class="footer" style="padding:30px;padding-top: 70px;">
			<table style="width:100%;">
				<tr>
					<td>
						<h5><b><u>Attend by:</u></b></h5>
						<p style="font-weight:600;">{{$data->doctor_name}}</p>
					</td>
					<td style="text-align: right;">
						<h5><b><u>Invoice Generated By:</u></b></h5>
						<p style="font-weight:600;">Sewa Partner</p>
					</td>
				</tr>
			</table>
			<p style="text-align:center;font-size:14px; position:absolute; bottom:10px; left:36%;">COMPUTER GENERATED INVOICE</p>
		</div>
	</div>
</html>