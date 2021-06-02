@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Foto Barang</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Barang</th>
                                        <th>Foto</th>
                                        <th>Default</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>
                                                <img src="{{ url($item->photo) }}" alt="">
                                            </td>
                                            <td>{{ $item->is_default ? 'Ya' : 'Tidak' }}</td>
                                            <td>
                                                <form action="{{ route('product-galleries.destroy', $item->id) }}" method="post" class="d-inline form-delete{{$item->id}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-delete btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                Data tidak tersedia
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @push('after-script')
    <script>
        /* jQuery(document).ready(function(){
            $('.btn-delete').on('click', function(e){
                console.log('oi');
            });
        }); */
        jQuery('.btn-delete').on('click',function(e){
            e.preventDefault();
            let form = jQuery(this).parents('form');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            });
        });
    </script>
@endpush --}}