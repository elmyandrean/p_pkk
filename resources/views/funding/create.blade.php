@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create Funding
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('funding.index')}}"><i class="fa fa-dashboard"></i> Funding</a></li>
      <li class="active">Create</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">New Data Funding</h3>
      </div>
      <div class="box-body">
        <form action="{{route('funding.store')}}" method="POST" class="form-horizontal">
          @csrf
          <div class="form-group">
            <label for="product_holding" class="control-label col-md-2">Product Holding</label>
            <div class="col-md-6">
              <select name="product_holding" id="product-holding" class="form-control">
                <option selected disabled>Pilih Product Holding</option>
                <option value="Giro">Giro</option>
                <option value="Tabungan">Tabungan</option>
                <option value="Payroll">Payroll</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="product_content" class="control-label col-md-2">Product Content</label>
            <div class="col-md-6">
              <select name="product_content" id="product-content" class="form-control" onchange="changeProduct(this.value);">
                <option selected disabled>Pilih Product Content</option>
                <option value="Giro">Giro</option>
                <option value="Tabungan">Tabungan</option>
                <option value="Payroll">Payroll</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="source_customer" class="control-label col-md-2">Source Customer</label>
            <div class="col-md-6">
              <select name="source_customer" id="source-customer" class="form-control">
                <option selected disabled>Pilih Source Customer</option>
                <option value="Giro">Referal Customer</option>
                <option value="Tabungan">Walk in Customer</option>
                <option value="Payroll">Pipeline Source From Area</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="branch" class="control-label col-md-2">Branch</label>
            <div class="col-md-6">
              <select name="branch" id="branch" class="form-control">
                <option selected disabled>Pilih Branch</option>
                <option value="Giro">Referal Customer</option>
                <option value="Tabungan">Walk in Customer</option>
                <option value="Payroll">Pipeline Source From Area</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="posisi_jabatan" class="control-label col-md-2">Posisi Jabatan</label>
            <div class="col-md-6">
              <select name="posisi_jabatan" id="posisi-jabatan" class="form-control">
                <option selected disabled>Pilih Posisi Jabatan</option>
                <option value="Giro">Referal Customer</option>
                <option value="Tabungan">Walk in Customer</option>
                <option value="Payroll">Pipeline Source From Area</option>
              </select>
            </div>
          </div>
          <hr>
          <div class="form-group">
            <label for="nama_nasabah" class="control-label col-md-2">Nama Nasabah</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="nama_nasabah" id="nama-nasabah">
            </div>
          </div>
          <div id="non-payroll" style="display: block">
            <div class="form-group">
              <label for="no_rekening" class="control-label col-md-2">No. Rekening</label>
              <div class="col-md-6">
                <input type="number" class="form-control" name="no_rekening" id="no-rekening">
              </div>
            </div>
            <div class="form-group">
              <label for="setoran_awal" class="control-label col-md-2">Setoran Awal</label>
              <div class="col-md-6">
                <input type="number" class="form-control" name="setoran_awal" id="setoran-awal">
              </div>
            </div>
          </div>
          <div id="payroll" style="display:none;">
            <div class="form-group">
              <label for="pks_payroll" class="control-label col-md-2">PKS Payroll</label>
              <div class="col-md-6">
                <select name="pks_payroll" id="pks-payroll" class="form-control">
                  <option selected disabled>Pilih PKS Payroll</option>
                  <option value="Lengkap">Lengkap</option>
                  <option value="Tidak Lengkap">Tidak Lengkap</option>
                  <option value="Lain-lain">Lain-lain</option>
                </select>
              </div>
            </div>
            <div class="form-group">
                <label for="jumlah_pegawai_tetap" class="control-label col-md-2">Jumlah Pegawai Tetap</label>
                <div class="col-md-6">
                  <input type="number" class="form-control" name="jumlah_pegawai_tetap" id="jumlah-pegawai-tetap">
                </div>
              </div>
            <div class="form-group">
              <label for="limit_payroll" class="control-label col-md-2">Limit Payroll</label>
              <div class="col-md-6">
                <input type="number" class="form-control" name="limit_payroll" id="limit-payroll">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-2 col-md-6">
              <button class="btn btn-primary">Simpan</button>
              <a href="{{route('funding.index')}}" class="btn btn-warning">Batal</a>
            </div>
          </div>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
@endsection

@section('script')
  <script type="text/javascript">
    function changeProduct(value){
      if(value == "Payroll"){
        $('#non-payroll').hide();
        $('#payroll').show();
      } else {
        $('#non-payroll').show();
        $('#payroll').hide();
      }
    }
  </script>
@endsection