<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded-lg">
            <div class="card-header">
                <i class="fa fa-award"></i> VOUCHERS
            </div>
            <div class="card-body">

                <form action="" method="GET">
                    <div class="input-group">
                        <div class="input-group-append">
                            <a href="{{ route('console.vouchers.create') }}" class="btn btn-dark"><i
                                    class="fa fa-plus-circle"></i>
                                ADD
                            </a>
                        </div>
                        <input type="text" wire:model="search" placeholder="cari sesuatu disini..." class="form-control">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> SEARCH
                            </button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">NO.</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">VOUCHER</th>
                                <th scope="col">NOMINAL</th>
                                <th scope="col">MINIMAL SHOPPING</th>
                                <th scope="col">OPTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vouchers as $no => $voucher)
                            <tr>
                                <th class="text-center" scope="row">{{ ++$no + ($vouchers->currentPage()-1) * $vouchers->perPage() }}</th>
                                <td>{{ $voucher->title }}</td>
                                <td>{{ $voucher->voucher }}</td>
                                <td class="text-right">{{ money_id($voucher->nominal_voucher) }}</td>
                                <td class="text-right">{{ money_id($voucher->total_minimal_shopping) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('console.vouchers.edit', $voucher->id) }}"
                                        class="btn btn-sm btn-primary">EDIT</a>
                                    <button wire:click="destroy({{ $voucher->id }})" class="btn btn-sm btn-danger">DELETE</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $vouchers->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
