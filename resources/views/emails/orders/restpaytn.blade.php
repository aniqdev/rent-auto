{{-- @component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Topobytnevozy.cz - Doplacení pronájmu a kauce</title>
</head>

<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">
	<table class="nl-container" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;" cellpadding="0" cellspacing="0" role="presentation" width="100%" bgcolor="#FFFFFF" valign="top">
		<tbody>
			<tr style="vertical-align: top;" valign="top">
				<td style="word-break: break-word; vertical-align: top;" valign="top">
					<div style="background-color:#f9f9ff;">
						<div class="block-grid " style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:22px; padding-bottom:22px; padding-right: 0px; padding-left: 0px;">
											<div class="img-container center autowidth" align="center" style="padding-right: 0px;padding-left: 0px;">
                                                <a href="http://www.example.com/" target="_blank" style="outline:none" tabindex="-1"><img class="center autowidth" align="center" border="0" src="{{ config('app.url') }}/images/logo-original.png" alt="Logo" title="TopObytneVozy.cz" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 138px; display: block;" width="138"></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="background-color:transparent;">
						<div class="block-grid " style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
											<div style="color:#6a6a6a;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:60px;padding-right:0px;padding-bottom:10px;padding-left:0px;">
												<div class="txtTinyMce-wrapper" style="font-size: 14px; line-height: 1.2; color: #6a6a6a; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 17px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        <strong>
                                                            <span style="font-size: 16px;">Rezervace č. {{ $reservation->id }}</span>
                                                        </strong>
                                                    </p>
												</div>
											</div>
											<div style="color:#000000;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
												<div class="txtTinyMce-wrapper" style="font-size: 14px; line-height: 1.2; color: #000000; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 17px;">
													<p style="margin: 0; font-size: 34px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 41px; margin-top: 0; margin-bottom: 0;">
                                                        <span style="font-size: 34px; color: #383833;">
                                                            <strong> Doplacení pronájmu</strong>
                                                        </span>
                                                    </p>
												</div>
											</div>
											<div style="color:#6a6a6a;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:0px;padding-bottom:45px;padding-left:0px;">
												<div class="txtTinyMce-wrapper" style="font-size: 14px; line-height: 1.2; color: #6a6a6a; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 17px;">
													<p style="margin: 0; font-size: 20px; line-height: 1.2; word-break: break-word; text-align: start; mso-line-height-alt: 18px; margin-top: 0; margin-bottom: 0;">
                                                        <span style="font-size: 15px;">
                                                            <strong>Dobrý den,</strong>
                                                        </span>
                                                    </p>
                                                    <p style="margin: 0; font-size: 15px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 18px; margin-top: 0; margin-bottom: 0;">
                                                        <span style="font-size: 15px;"><strong>
                                                    <p>
                                                        momentálně máte <strong style="color: #3b358b">{{$days_to_start}}</strong> dní před začátkem pronájmu Vašeho obytného auta. Rádi bychom Vás tedy požádali o doplacení celkové částky za pronájem.
                                                    </p>

                                                    <p>
                                                        Zároveň Vás poprosíme o zaplacení vratné kauce v hodnotě 30 000,- Kč. Veškeré platební údaje jsou stejné jako u placení pronájmu, jen uveďte do zprávy příjemci ,,vratná kauce Jméno a Příjmení,,.
                                                    </p>
                                                    </strong></span></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="background-color:#f9f9ff;">
						<div class="block-grid " style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:40px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
											<div style="color:#6a6a6a;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
												<div class="txtTinyMce-wrapper" style="font-size: 14px; line-height: 1.2; color: #6a6a6a; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 17px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        <strong>Způsob platby: bankovní převod</strong>
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="background-color:#f9f9ff;">
						<div class="block-grid two-up no-stack" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
											<div style="color:#393d47;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        Majitel účtu::
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
											<div style="color:#393d47;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        <strong>{{ $bankwire_name }}</strong>
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="background-color:#f9f9ff;">
						<div class="block-grid two-up no-stack" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
											<div style="color:#393d47;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        Číslo účtu:
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
											<div style="color:#393d47;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        <strong>{{ $bankwire_number }}</strong>
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="background-color:#f9f9ff;">
						<div class="block-grid two-up no-stack" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
											<div style="color:#393d47;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        Variabilní symbol:
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
											<div style="color:#3b358b;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #3b358b; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        <strong>{{ $reservation->id }}</strong>
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="background-color:#f9f9ff;">
						<div class="block-grid two-up no-stack" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
											<div style="color:#393d47;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        Banka:
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
											<div style="color:#393d47;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        <strong>{{ $bankwire_bank }}</strong>
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div style="background-color:#f9f9ff;">
						<div class="block-grid two-up no-stack" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
											<div style="color:#393d47;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        Datum splatnosti do:
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
											<div style="color:#393d47;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        <strong>{{ $pay_day }}</strong>
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="background-color:#f9f9ff;">
						<div class="block-grid two-up no-stack" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
											<div style="color:#393d47;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        <strong>
                                                            <span style="font-size: 20px;">
                                                                Částka:
                                                            </span>
                                                        </strong>
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
											<div style="color:#3b358b;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #3b358b; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 20px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;">
                                                        <span style="font-size: 20px;">
                                                            <strong>{{ $bankwire_price }} Kč</strong>
                                                        </span>
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="background-color:#f9f9ff;">
						<div class="block-grid " style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:40px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
											<div style="color:#6a6a6a;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
												<div class="txtTinyMce-wrapper" style="font-size: 14px; line-height: 1.2; color: #6a6a6a; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 17px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        <strong>Podrobnosti rezervace</strong>
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="background-color:#f9f9ff;">
						<div class="block-grid two-up no-stack" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
											<div style="color:#393d47;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        Karavan:
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
											<div style="color:#393d47;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        <strong>{{ $caravan }}</strong>
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="background-color:#f9f9ff;">
						<div class="block-grid two-up no-stack" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
											<div style="color:#393d47;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        Datum od:
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
											<div style="color:#393d47;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        <strong>{{ $start_date }}</strong>
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="background-color:#f9f9ff;">
						<div class="block-grid two-up no-stack" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
	                            <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
                                            <div style="color:#393d47;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        Datum do:
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
                                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 10px; padding-left: 10px;">
										<div style="color:#393d47;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                        <strong>{{ $end_date }}</strong>
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div style="background-color:transparent;">
						<div class="block-grid " style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
											<div style="color:#6a6a6a;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:45px;padding-right:0px;padding-bottom:10px;padding-left:0px;">
												<div class="txtTinyMce-wrapper" style="font-size: 14px; line-height: 1.2; color: #6a6a6a; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 17px;">
                                                    <p style="margin: 0; font-size: 15px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 18px; margin-top: 0; margin-bottom: 0;">
                                                        <span style="font-size: 15px;">
                                                            <strong>
                                                                <p>
                                                                    Pokud jste již doplacení pronájmu uskutečnili, berte tento email za bezpředmětný.
                                                                </p>
                                                                <p>
                                                                    V případě dotazů nás neváhejte kontaktovat,
                                                                </p>
                                                                <p>
                                                                    Tým TopObytneVozy.cz
                                                                </p>
                                                            </strong>
                                                        </span>
                                                    </p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="background-color:#000000;">
						<div class="block-grid " style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
									<div class="col_cont" style="width:100% !important;">
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:20px; padding-right: 0px; padding-left: 0px;">
											<div class="img-container center autowidth" align="center" style="padding-right: 0px;padding-left: 0px;">
												<div style="font-size:1px;line-height:35px">&nbsp;</div>
                                                <a href="{{ config('app.url') }}" target="_blank" style="outline:none" tabindex="-1">
                                                    <img class="center autowidth" align="center" border="0"
                                                    src="{{ config('app.url') }}/images/logo-admin.png" alt="Logo" title="TopObytneVozy.cz"
                                                    style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 138px; display: block;" width="138">
                                                </a>
												<div style="font-size:1px;line-height:30px">&nbsp;</div>
											</div>
											<div style="color:#ffffff;font-family:Raleway, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
												<div class="txtTinyMce-wrapper" style="font-size: 12px; line-height: 1.2; color: #ffffff; font-family: Raleway, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p style="margin: 0; font-size: 12px; text-align: center; line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin-top: 0; margin-bottom: 0;">TopObytneVozy.cz. Všechny práva vyhrazena.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</body>

</html>
