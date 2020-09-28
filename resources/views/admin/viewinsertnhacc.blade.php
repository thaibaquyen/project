<div>
<form action="{{ url('insertncc') }}" class="was-validated" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <table>
          <tr>
            <td style="width:400px">
                <p>name</p>
                <input type="text" placeholder="nhập tên" name="name">
                
                <p>số điện thoại</p>
                <input type="text" placeholder="nhập sdt"  name="sdt">
                
                <p>số sân có</p>
                <input type="text" placeholder="nhập sdt"  name="sosan">
                <p>phường</p>
                <select name = "dc">
                  @foreach($diachi as $dc)                   
                    <option value="{{ $dc->madc }}">{{ $dc->tendc }}</option>        
                  @endforeach
                </select>
                <input type="hidden"  name="idncc">
            </td>
            <td>
                <p>địa chỉ cụ thể</p>
                <input type="text" placeholder="nhập địa chỉ"  name="address">
                
                <p>giá tiền</p>
                <input type="text" placeholder="nhập giá tiền" name="giatien">

                <p>img</p>
                <input type="file" placeholder="nhập file" name="img">
            </td>
            <td>
                <p>username</p>
                <input type="text" placeholder="nhập username"  name="username">
                
                <p>password</p>
                <input type="text" placeholder="nhập password" name="password">
            </td>
            <td>
                <input type="submit" value="Thêm">
            </td>
          </tr>
        </table>
</form>
</td>