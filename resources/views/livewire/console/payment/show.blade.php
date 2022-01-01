<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded-lg">
            <div class="card-header">
                <i class="fa fa-credit-card"></i> DETAIL PAYMENT
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td style="width: 20%">
                                    NO. INVOICE
                                </td>
                                <td style="width: 1%">:</td>
                                <td>
                                    {{ $payment->invoice }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    NAMA LENGKAP
                                </td>
                                <td>:</td>
                                <td>
                                    {{ $payment->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    NO. TELP / WA
                                </td>
                                <td>:</td>
                                <td>
                                    {{ $payment->phone }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    TRANSFER DARI BANK
                                </td>
                                <td>:</td>
                                <td>
                                    {{ $payment->bank_transfer_from }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    TRANSFER KE BANK
                                </td>
                                <td>:</td>
                                <td>
                                    {{ $payment->bank_transfer_to }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    ATAS NAMA
                                </td>
                                <td>:</td>
                                <td>
                                    {{ $payment->from_name }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    TOTAL TRANSFER
                                </td>
                                <td>:</td>
                                <td>
                                    {{ money_id($payment->total) }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    TANGGAL TRANSFER
                                </td>
                                <td>:</td>
                                <td>
                                    {{ $payment->transfer_date }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    CATATAN
                                </td>
                                <td>:</td>
                                <td>
                                    {{ $payment->none }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    BUKTI TRANSFER
                                </td>
                                <td>:</td>
                                <td class="text-center">
                                    <img src="{{ Storage::url('public/payments/').$payment->image }}"
                                        style="width: 300px">
                                </td>
                            </tr>
                        </table>
                        <a href="{{ route('console.payment.index') }}" class="btn btn-md btn-dark shadow"><i
                                class="fa fa-long-arrow-alt-left"></i>
                            KEMBALI</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
