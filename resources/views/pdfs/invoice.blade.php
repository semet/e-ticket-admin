<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Invoice</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
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
            padding-bottom: 40px;
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

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <h4>Bolamlombok</h4>
                        </td>

                        <td>
                            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate(route('admin.confirm.ticket', ['bookingId' => $booking->id, 'passengerId' => $passenger->id]))) !!} ">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            <b>Kode:</b> {{ $booking->number }}<br />
                            <b>Tanggal:</b> {{ $booking->date }}<br />
                            <b>Lokasi:</b> {{$booking->destination->location}}.<br />

                        </td>

                        <td>
                            <b>Jam:</b> {{ substr($booking->schedule->start_hour, 0, 5). ' - ' .substr($booking->schedule->end_hour, 0, 5)  }} <br/>
                            <b>Paket:</b> {{ $booking->type != 'quantity' ? $booking->type : '-' }}<br />
                            <b>Seat: </b> 1 dari {{ $booking->passengers->count() }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>Nama Penumpang</td>

            <td>Nominal</td>
        </tr>
        @if($booking->type == 'couple')
            @foreach($booking->passengers as $passenger)
                <tr class="item">
                    <td>{{ $passenger->name }}</td>

                    <td></td>
                </tr>
            @endforeach
            <tr class="total">
                <td></td>

{{--                <td>Total: Rp. {{ number_format($booking->destination->price * $booking->passengers->count()) }}</td>--}}
                <td>Total: Rp. {{ number_format(config('site.couple_actual_price')) }}</td>
            </tr>
        @elseif($booking->type == 'family')
            @foreach($booking->passengers as $passenger)
                <tr class="item">
                    <td>{{ $passenger->name }}</td>

                    <td></td>
                </tr>
            @endforeach
            <tr class="total">
                <td></td>

{{--                <td>Total: Rp. {{ number_format($booking->destination->price * $booking->passengers->count()) }}</td>--}}
                <td>Total: Rp. {{ number_format(config('site.family_actual_price')) }}</td>
            </tr>
        @elseif($booking->type == 'quantity')
            @foreach($booking->passengers as $passenger)
                <tr class="item">
                    <td>{{ $passenger->name }}</td>

                    <td>Rp. {{ number_format($booking->destination->price) }}</td>
                </tr>
            @endforeach
            <tr class="total">
                <td></td>

                <td>Total: Rp. {{ number_format($booking->destination->price * $booking->passengers->count()) }}</td>
            </tr>
        @endif
    </table>
</div>
</body>
</html>
