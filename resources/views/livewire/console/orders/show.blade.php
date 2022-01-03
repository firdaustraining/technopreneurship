<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded-lg">
            <div class="card-header">
                <i class="fa fa-shopping-cart"></i> DETAIL ORDERS
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td style="width: 25%">
                            NO. INVOICE
                        </td>
                        <td style="width: 1%">:</td>
                        <td>
                            {{ $invoice->invoice }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            NAMA LENGKAP
                        </td>
                        <td>:</td>
                        <td>
                            {{ $invoice->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            NO. TELP / WA
                        </td>
                        <td>:</td>
                        <td>
                            {{ $invoice->phone }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            KURIR / SERVICE / COST
                        </td>
                        <td>:</td>
                        <td>
                            {{ strtoupper($invoice->courier) }} | {{ $invoice->service }} -
                            {{ money_id($invoice->cost_courier) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            PROVINSI
                        </td>
                        <td>:</td>
                        <td>


                        {{-- // $response = Http::withHeaders([
                        //         'key' => '7895f449e21707ab49bd2e40947933d8',
                        //     ])->get('https://api.rajaongkir.com/starter/province?id=',[
                        //     'province' => $invoice->province
                        //     ]);
                        //     $provinces = $response['rajaongkir']['results'];
                        //     dd($provinces); --}}

                            {{-- {{ $provinces }} --}}
                                    @php
                                $province_name = Http::withHeaders(['key' => '7895f449e21707ab49bd2e40947933d8'])
                                ->get('https://api.rajaongkir.com/starter/province?id=' . $invoice->province)->json();
                                // dd($province_name);
                                $provinces = $province_name['rajaongkir']['results']['province'];
                                echo ($provinces);

@endphp



                        </td>
                    </tr>
                    <tr>
                        <td>
                            KOTA / KABUPATEN
                        </td>
                        <td>:</td>
                        <td>
                            @php
                            $city_name = Http::withHeaders(['key' => '7895f449e21707ab49bd2e40947933d8'])
                            ->get('https://api.rajaongkir.com/starter/city?id=' . $invoice->city)->json();
                            $city = $city_name['rajaongkir']['results']['city_name'];
                           echo ($city);
                            // dd($city);
                            @endphp
                        </td>
                    </tr>
                    <tr>

                    </tr>
                    <tr>
                        <td>
                            ALAMAT LENGKAP
                        </td>
                        <td>:</td>
                        <td>
                            {{ $invoice->address }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            TOTAL PEMBELIAN
                        </td>
                        <td>:</td>
                        <td>
                            {{ money_id($invoice->grand_total) }}
                        </td>
                    </tr>
                </table>

                <hr>

                <table class="table"
                    style="border-style: solid !important;border-color: rgb(198, 206, 214) !important;">
                    <tbody>

                        @foreach ($invoice->order as $order)

                        @php
                        $harga_set = $order->price * $order->discount / 100;
                        $harga_diskon = $order->price - $harga_set;
                        @endphp


                        <tr style="background: #edf2f7;">
                            <td class="b-none" width="15%">
                                <div class="wrapper-image-cart">
                                    <img src="{{ Storage::url('public/products/').$order->image }}"
                                        style="width: 100%;border-radius: .5rem">
                                </div>
                            </td>
                            <td class="b-none">
                                <h5><b>{{ $order->product_name }}</b></h5>
                                <table class="table-borderless" style="font-size: 14px">
                                    <tr>
                                        <td style="padding: .20rem">PRICE</td>
                                        <td style="padding: .20rem">:</td>
                                        <td style="padding: .20rem">{{ money_id($harga_diskon) }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: .20rem">QTY</td>
                                        <td style="padding: .20rem">:</td>
                                        <td style="padding: .20rem"><b>{{ $order->unit_weight }}
                                                {{ $order->unit }}</b></td>
                                    </tr>
                                </table>

                            </td>
                        </tr>

                        @endforeach
                    </tbody>

                </table>

                <a href="{{ route('console.orders.index') }}" class="btn btn-dark btn-md"><i
                        class="fa fa-long-arrow-alt-left"></i>
                    KEMBALI</a>

            </div>
        </div>
    </div>
</div>
