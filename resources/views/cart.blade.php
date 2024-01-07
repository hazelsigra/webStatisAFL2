@extends('Layout.MainLayout')

@section('container')
    <div class="container">
        @error('delete_cart')
            @if (str_contains($message, 'ok'))
                <div class="alert alert-success" role="alert">Yeay! Item successfully removed. 
                    <a href="/cart/delete/{{ implode('+', session('cart_id')) }}/undo" class="alert-link"><b>Undo</b></a>
                </div>
            @else
                <div class="alert alert-danger" role="alert">Oops! .</div>
            @endif
        @enderror
        <table width="100%">
            <td>
                <h1>Cart </h1>
            </td>
            <td style="text-align: right;">
                <button class="btn btn-warning btn-block d-none" id="bulk-delete" onclick="return appendUrl()">
                    <a href="" class="text-decoration-none text-reset">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        Remove
                    </a>
                </button>
            </td>
        </table>
        <table class="table table-striped">
            <tbody>
                @foreach ($allCart as $ac)
                    <tr class="">
                        <th scope="row"><input type="checkbox" name="select-to-remove" id="" class="form-check-input" onchange="return checkAndAppendCart({{ $ac->id }})"></th>
                        <td><img src="/images//{{ $ac->menu->photo }}" style="width: 150px" class="img-thumbnail rounded mx-auto d-block"></td>
                        <td>
                            <h6>{{ $ac->menu->name }}</h6>
                            <p>{{ $ac->menu->type }}</p>
                        </td>
                        <td><button class="btn btn-block btn-sm btn-outline-warning"><a href="/cart/delete/{{ $ac->id }}" class="text-decoration-none text-reset"><i class="fa fa-trash mx-1" aria-hidden="true"></i>Remove</a></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        setTimeout(function() {
            var alertList = document.querySelectorAll('.alert')
            alertList.forEach(function (alert) {
                alert.remove()
            })
        }, 10000);

        let checkedCarts = [];
        const bulkDeleteBtn = document.querySelector('#bulk-delete')
        function checkAndAppendCart(menuId) {
            const idx = checkedCarts.indexOf(menuId)
            if (idx != -1) {
                checkedCarts.splice(idx, 1)
                if (checkedCarts.length == 0) {
                    bulkDeleteBtn.classList.add('d-none')
                }
                return true
            }
            checkedCarts.push(menuId)
            bulkDeleteBtn.classList.remove('d-none')
        }

        function appendUrl() {
            const url = `/cart/delete/${checkedCarts.join('+')}/bulk`
            document.querySelector('#bulk-delete a').href = url
        }
    </script>
@endsection