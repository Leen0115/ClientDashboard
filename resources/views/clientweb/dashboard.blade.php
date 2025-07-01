@extends('layouts.client') 
@section('content')
<!-- ================================
    تحميل مكتبات الجافاسكريبت والستايل اللازمة للرسوم البيانية والفلاتر
    - Chart.js: لرسم الشارتات
    - daterangepicker: لاختيار نطاق التاريخ
    - jQuery و moment.js: متطلبات daterangepicker
    - Highcharts: لرسم خريطة السعودية
================================ -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/sa/sa-all.js"></script>
<!-- ================================
    بداية لوحة البيانات الرئيسية
    - عنوان الصفحة
================================ -->
<h2 class="mb-3" style="color:#00000;">لوحة البيانات</h2>
<!-- ================================
    بطاقات إحصائية سريعة لحالات الطلبات
    - البحث / في رحلة / مكتمل
================================ -->
<div class="row mt-3">
    <!-- بطاقة 1: البحث -->
    <div class="col-md-4 mb-2">
        <div class="p-3 rounded shadow-sm d-flex justify-content-between align-items-center" style="background-color: #ffff;">
            <div>
                <div class="d-flex align-items-center">
                    <i class="bi bi-search fs-4 ms-2" style="color: #7514C0;"></i>
                    <span class="card-text">حالة الطلب: البحث</span>
                </div>
                <div class="fs-3 move-number-right">129</div>
            </div>
            <div class="d-flex flex-column align-items-end move-rate-left">
                <div class="badge rounded px-3 py-2 text-white fw-bold mb-1" style="background-color: #7514C0;">
                    <i class="bi bi-arrow-up-right"></i> +12%
                </div>
                <div class="card-text-small mt-1 m-0 p-0" style="color: #515151">مقارنة بالأسبوع الماضي</div>
            </div>
        </div>
    </div>
    <!-- بطاقة 2: في رحلة -->
    <div class="col-md-4 mb-2">
        <div class="p-3 rounded shadow-sm d-flex justify-content-between align-items-center" style="background-color: #ffff;">
            <div>
                <div class="d-flex align-items-center">
                    <i class="bi bi-truck fs-4 ms-2" style="color: #7514C0;"></i>
                    <span class="card-text">حالة الطلب: في رحلة</span>
                </div>
                <div class="fs-3 move-number-right">78</div>
            </div>
            <div class="d-flex flex-column align-items-end move-rate-left">
                <div class="badge rounded px-3 py-2 text-white fw-bold mb-1" style="background-color: #7514C0;">
                    <i class="bi bi-arrow-up-right"></i> +12%
                </div>
                <div class="card-text-small mt-1 m-0 p-0" style="color: #515151">مقارنة بالأسبوع الماضي</div>
            </div>
        </div>
    </div>
    <!-- بطاقة 3: مكتمل -->
    <div class="col-md-4 mb-3">
        <div class="p-3 rounded shadow-sm d-flex justify-content-between align-items-center" style="background-color: #ffff;">
            <div>
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle fs-4 ms-2" style="color: #7514C0;"></i>
                    <span class="card-text">حالة الطلب: مكتمل</span>
                </div>
                <div class="fs-3 move-number-right">65</div>
            </div>
            <div class="d-flex flex-column align-items-end move-rate-left">
                <div class="badge rounded px-3 py-2 text-white fw-bold mb-1" style="background-color: #7514C0;">
                    <i class="bi bi-arrow-up-right"></i> +12%
                </div>
                <div class="card-text-small mt-1 m-0 p-0" style="color: #515151">مقارنة بالأسبوع الماضي</div>
            </div>
        </div>  
    </div>
</div>
<!-- ================================
    رسم بياني: نظرة عامة على إجمالي الطلبات مع فلتر التاريخ
================================ -->
<!-- نظرة عامة على إجمالي الطلبات -->
    <div class="col-12">
<div class="p-3 rounded shadow-sm" style="background-color: #fff;min-height: 400px;">
    <div class="d-flex justify-content-between align-items-start mb-1">
                <div>
                    <h5 class="mb-1 mt-2"style="color: #515151;font-size: 18px;">
                        <i class="bi bi-box-seam ms-2"></i>نظرة عامة على إجمالي الطلبات</h5>
                    <p class="text-muted small mb-0">
يعرض هذا الرسم البياني إجمالي عدد طلبات الرحلات على مر الزمن، مما يساعدك على تتبع اتجاهات الطلب وفترات الذروة.                    </p>
                </div>
                <div class="d-flex align-items-center">
                    <!-- التاريخ -->
   <div class="position-relative me-3" style="width:220px;">
    <i class="bi bi-calendar-event-fill position-absolute" style="top: 50%; right: 12px; transform: translateY(-50%); color: #888;"></i>
    <i class="bi bi-chevron-down position-absolute" style="top: 50%; left: 10px; transform: translateY(-50%); color: #888;"></i>
    <input type="text" id="daterange" 
        class="form-control form-control-sm pe-5 ps-4 text-end" 
        placeholder="اختر نطاق التاريخ"
        style="background-color: #F6F7F9; cursor: pointer;" readonly /></div>
   <!-- إجمالي الطلبات -->
     <div class="text-center p-3 rounded border " style="background-color: #F6F7F9; min-width: 180px; margin-right:10px;">
         <div class="rounded text-muted small">إجمالي الطلبات/الرحلات</div>
             <div class="fw-bold fs-5"style="color: #515151">12,127</div>
     </div>
     </div>
     </div>
        <canvas id="ordersChart" style="width:1600px;height:300px"></canvas>
        </div>
    </div>
    <!-- ================================
    قسم تحليلات الموردين (شارت أفقي + فلتر تاريخ)
================================ -->
    <div class="row mt-3">
    <!-- قسم تحليلات الموردين -->
<div class="col-md-6">
    <div class="p-3 rounded shadow-sm min-height: 300px;" style="background-color: #fff;">
        <div class="d-flex justify-content-between align-items-start mb-2">
            <!-- العنوان والنص -->
            <div>
                <h5 class="mb-1"style="color: #515151;font-size: 18px;">
                    <i class="bi bi-diagram-3-fill ms-2"></i>تحليلات الموردين
                </h5>
                <p class="text-muted small mb-0">
                    هذا المخطط يعرض العدد الإجمالي للطلبات من قبل الموردين  خلال النطاق الزمني المحدد، مما يساعد على تتبع الاتجاهات وفترات الذروة.
                </p>
            </div>
            <!-- التاريخ والبوكسين على اليسار -->
            <div style="min-height: 150px;">
                <div class="position-relative" style="width: 227px;">
                    <i class="bi bi-calendar-event-fill position-absolute" style="top: 50%; right: 12px; transform: translateY(-50%); color: #888;"></i>
                    <i class="bi bi-chevron-down position-absolute" style="top: 50%; left: 10px; transform: translateY(-50%); color: #888;"></i>
                   <input type="text" id="supplier-daterange"
    class="form-control form-control-sm pe-5 ps-4 text-end"
    placeholder="اختر نطاق التاريخ"
    style="background-color: #F6F7F9; cursor: pointer;" readonly>
                </div>
                <div class="d-flex gap-2 mt-1" style="width: 227px;">
                    <div class="text-center p-2 rounded border flex-fill" style="background-color: #F6F7F9; min-width: 0;">
                        <div class="text-muted small">تم الطلب</div>
                        <div class="fw-bold fs-5"style="color: #515151">12,127</div>
                    </div>
                    <div class="text-center p-2 rounded border flex-fill" style="background-color: #F6F7F9; min-width: 0;">
                        <div class="text-muted small">مكتملة</div>
                        <div class="fw-bold fs-5"style="color: #515151">11,972</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- الرسم البياني -->
        <canvas id="supplierChart" height="500" width="750"></canvas>
    </div>
</div>
<!-- ================================
    قسم تحليلات العملاء (شارت أفقي + فلتر تاريخ)
================================ -->
    <!-- قسم تحليلات العملاء -->
  <div class="col-md-6">
  <div class="p-3 rounded shadow-sm min-height: 600px;" style="background-color: #fff;">
    <div class="d-flex justify-content-between align-items-start mb-2">
      <!-- العنوان والنص -->
      <div>
        <h5 class="mb-1"style="color: #515151;font-size: 18px;">
          <i class="bi bi-people-fill ms-2"></i>تحليلات العملاء
        </h5>
        <p class="text-muted small mb-0">
يعرض هذا المخطط العدد الإجمالي لطلبات العملاء خلال النطاق الزمني المحدد، مما يساهم في تتبع النشاط وتحليله.        </p>
      </div>
      <!-- التاريخ وإجمالي الطلبات على اليسار -->
      <div style="min-height: 150px;">
        <div class="position-relative my-2" style="width: 227px;">
          <i class="bi bi-calendar-event-fill position-absolute" style="top: 50%; right: 12px; transform: translateY(-50%); color: #888;"></i>
          <i class="bi bi-chevron-down position-absolute" style="top: 50%; left: 10px; transform: translateY(-50%); color: #888;"></i>
         <input type="text" id="client-daterange"
            class="form-control form-control-sm pe-5 ps-4 text-end"
            placeholder="اختر نطاق التاريخ"
            style="background-color: #F6F7F9; cursor: pointer;" readonly>
                </div>
        <div class="text-center p-2 rounded border mb-3" style="background-color: #F6F7F9;width: 227px;">
          <div class="text-muted small"style="color: #515151;">إجمالي الطلبات</div>
          <div class="fw-bold fs-5" style="color: #515151;">12,127</div>
        </div>
      </div>
    </div>
    <canvas id="clientChart" height="500" width="750"></canvas>
  </div>
</div>
</div>
<!-- ================================
    أعلى المدن والعملاء
    - جدول المدن والعملاء
    - خريطة السعودية التفاعلية
    - فلتر التاريخ
================================ -->
<!-- أعلى المدن والعملاء -->
<div class="col-12 mt-3">
  <div class="p-3 rounded shadow-sm mb-4" style="background-color: #fff; min-height: 600px;">
    <div class="d-flex justify-content-between align-items-start flex-wrap">
      <!-- العنوان والوصف + التاريخ -->
      <div class="d-flex align-items-center gap-3">
        <div>
          <h5 class="mb-1 "style="color: #515151;font-size: 18px;">
            <i class="bi bi-bar-chart-line-fill"style="color: #515151;font-size: 18px;"></i> أعلى المدن والعملاء
          </h5>
          <p class="text-muted small mb-0">
            يعرض هذا المربع إجمالي الطلبات وأهم العملاء حسب المدن.
          </p>
        </div>
        <!-- فلتر التاريخ -->
        <div class="position-relative" style="width: 227px;">
          <i class="bi bi-calendar-event-fill position-absolute" style="top: 50%; right: 12px; transform: translateY(-50%); color: #888;"></i>
          <i class="bi bi-chevron-down position-absolute" style="top: 50%; left: 10px; transform: translateY(-50%); color: #888;"></i>
          <input type="text" id="top-cities-daterange"
            class="form-control form-control-sm pe-5 ps-4 text-end"
            placeholder="اختر نطاق التاريخ"
            style="background-color: #F6F7F9; cursor: pointer;" readonly />
        </div>
      </div>
      <!-- نص المساعدة -->
      <div class="d-flex align-items-center flex-wrap gap-3 mt-3"style="margin-left:200px;margin-top;">
        <small class="text-muted" style="font-size: 14px;">
          <i class="bi bi-info-circle me-1"></i> مرر المؤشر على الخريطة لعرض عدد الطلبات لكل منطقة/مدينة.
        </small>
      </div>
      <div class="row mt-4 w-100">
        <!-- جدول أعلى المدن والعملاء -->
        <div class="col-md-6">
          <div class="table-responsive">
            <table class="table top-table">
              <thead>
                <tr>
                  <th>المدينة</th>
                  <th>عدد الطلبات</th>
                  <th>أفضل ٣ عملاء</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><span class="rank-circle rank-1">1</span> الرياض</td>
                  <td>1245</td>
                  <td>
                    <span class="client-pill">مصنع الحمراء - 54</span><br>
                    <span class="client-pill">سابك - 52</span><br>
                    <span class="client-pill">ABC - 47</span>
                  </td>
                </tr>
                <tr>
                  <td><span class="rank-circle rank-2">2</span> جدة</td>
                  <td>980</td>
                  <td>
                    <span class="client-pill">مصنع الحمراء - 54</span><br>
                    <span class="client-pill">سابك - 45</span><br>
                    <span class="client-pill">XYZ - 23</span>
                  </td>
                </tr>
                <tr>
                  <td><span class="rank-circle rank-3">3</span> الدمام</td>
                  <td>765</td>
                  <td>
                    <span class="client-pill">مياه رفا - 67</span><br>
                    <span class="client-pill">مصنع أ - 54</span><br>
                    <span class="client-pill">XYZ - 23</span>
                  </td>
                </tr>
                <tr>
                  <td>المدينة المنورة</td>
                  <td>654</td>
                  <td>
                    <span class="client-pill">مصنع الحمراء - 54</span><br>
                    <span class="client-pill">سابك - 52</span><br>
                    <span class="client-pill">ABC - 47</span>
                  </td>
                </tr>
                <tr>
                  <td>مكة</td>
                  <td>543</td>
                  <td>
                    <span class="client-pill">مصنع الحمراء - 54</span><br>
                    <span class="client-pill">سابك - 45</span><br>
                    <span class="client-pill">XYZ - 23</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- الخريطة  -->
        <div class="col-md-6">
<div id="sa-map-container" style="min-height: 570px; background: #fff; border-radius: 6px; padding: 15px;">
              </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ================================
    أعلى ٤ موردين 
    - لكل مورد: الرحلات المكتملة، إثباتات التسليم، أوامر الدفع
    - فلتر التاريخ
================================ -->
  <!-- أعلى ٤ موردين -->
<div class="col-12 mt-3">
  <div class="p-3 rounded shadow-sm mb-4" style="background-color: #fff; min-height: 600px;">
    <!-- العنوان والوصف وفلتر التاريخ -->
    <div class="d-flex justify-content-between align-items-start flex-wrap mb-4">
      <div class="d-flex align-items-start gap-3">
       <div>
          <h5 class="mb-1 mt-2" style="color: #515151;font-size: 18px;">
            <i class="bi bi-bar-chart-line-fill ms-2"></i>أعلى ٤ موردين - نظرة عامة على الرحلات وإثباتات التسليم وأوامر الدفع
          </h5>
          <p class="text-muted small mb-0">
            يعرض هذا القسم إجمالي عدد الرحلات المنفذة لكل مورد، وإثباتات التسليم (PODs)، وأوامر الدفع التي تم إنشاؤها خلال فترة زمنية محددة.
          </p>
        </div>
      </div>
      <div class="position-relative" style="width: 227px;">
        <i class="bi bi-calendar-event-fill position-absolute" style="top: 50%; right: 12px; transform: translateY(-50%); color: #888;"></i>
        <i class="bi bi-chevron-down position-absolute" style="top: 50%; left: 10px; transform: translateY(-50%); color: #888;"></i>
        <input type="text" id="top-suppliers-daterange"
          class="form-control form-control-sm pe-5 ps-4 text-end"
          placeholder="اختر نطاق التاريخ"
          style="background-color: #F6F7F9; cursor: pointer;" readonly />
      </div>
    </div>
    <!-- كروت الموردين -->
    @php
        $suppliers = [
            ['name' => 'ردود للخدمات اللوجستية', 'id' => 1],
            ['name' => 'المجدوعي للخدمات اللوجستية', 'id' => 2],
            ['name' => 'XYZ للخدمات اللوجستية', 'id' => 3],
            ['name' => 'ABC للخدمات اللوجستية', 'id' => 4],];
    @endphp
    <div class="row">
      @foreach($suppliers as $index => $supplier)
        <div class="col-md-6 mb-4">
          <div class="p-3 rounded h-100" style="background-color: #ffff;">
            <h6 class="mb-3" style="color: #515151;font-size: 18px;">{{ $index + 1 }}. {{ $supplier['name'] }}</h6>
            <div class="row text-center">
              <div class="col-4">
<div class="p-2 d-flex flex-column align-items-center justify-content-center"
     style="background-color: #F6F7F9; border-radius: 8px; width: 220px; height: 250px; min-width: 220px; min-height: 250px;">                    
     <div class="mb-2 mt-2" style="font-size: 14px;">الرحلات المكتملة</div>
                  <canvas id="tripsChart{{ $supplier['id'] }}" height="100" width="100" style="display: block; margin: 0 auto;"></canvas>
<div class="d-flex flex-column align-items-center mt-2">
    <div class="supplier-legend-label mt-2"><span class="dot" style="background-color:#e4e4e4;"></span>قيد التنفيذ</div>
    <div class="supplier-legend-label mt-1"><span class="dot" style="background-color:#250059;"></span>مكتمل</div>
                  </div>
                </div>
              </div>
              <div class="col-4">
<div class="p-2 d-flex flex-column align-items-center justify-content-center"
     style="background-color: #F6F7F9; border-radius: 8px; width: 220px; height: 250px; min-width: 220px; min-height: 250px;">                    <div class="mb-2 mt-2" style="font-size: 14px;">إثباتات التسليم (PODs)</div>
                  <canvas id="podChart{{ $supplier['id'] }}" height="100" width="100" style="display: block; margin: 0 auto;"></canvas>
                  <div class="d-flex flex-column align-items-center mt-2">
                    <div class="supplier-legend-label mt-2"><span class="dot" style="background-color:#e4e4e4;"></span>لم يسلم</div>
                    <div class="supplier-legend-label mt-1"><span class="dot" style="background-color:#489C7B;"></span>تم التسليم</div>
                  </div>
                </div>
              </div>
              <div class="col-4">
<div class="p-2 d-flex flex-column align-items-center justify-content-center"
     style="background-color: #F6F7F9; border-radius: 8px; width: 220px; height: 250px; min-width: 220px; min-height: 250px;">                  
     <div class="mb-2 mt-2" style="font-size: 14px;">أوامر الدفع</div>
                  <canvas id="paymentChart{{ $supplier['id'] }}" height="100" width="100" style="display: block; margin: 0 auto;"></canvas>
                  <div class="d-flex flex-column align-items-center mt-2">
                    <div class="supplier-legend-label mt-2"><span class="dot" style="background-color:#e4e4e4;"></span>لم تنشأ</div>
                    <div class="supplier-legend-label mt-1"><span class="dot" style="background-color:#7514C0;"></span>تم الإنشاء</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @if(($index + 1) % 2 == 0)
          </div><div class="row">
        @endif
      @endforeach
    </div>
  </div>
</div>
<!-- ================================
    بطاقات إجمالي الموردين والعملاء
================================ -->
  <div class="row mt-3">
    <!-- بطاقة 1: إجمالي الموردين -->
    <div class="col-md-6 mb-2">
        <div class="p-3 rounded shadow-sm d-flex justify-content-between align-items-center" style="background-color: #ffff;">
            <div>
                <div class="d-flex align-items-center">
                    <i class="bi bi-diagram-3-fill fs-4 ms-2" style="color: #7514C0;"></i>
                    <span class="card-text">إجمالي الموردين</span>
                </div>
                <div class="fs-3 move-number-right">56</div>
            </div>
            <div class="d-flex flex-column align-items-end move-rate-left">
                <div class="badge rounded px-3 py-2 text-white fw-bold mb-1" style="background-color: #7514C0;">
                    <i class="bi bi-arrow-up-right"></i> +12%
                </div>
                <div class="card-text-small mt-1 m-0 p-0" style="color: #515151">مقارنة بالأسبوع الماضي</div>
            </div>
        </div>
    </div>
    <!-- بطاقة 2: إجمالي العملاء -->
    <div class="col-md-6 mb-2">
        <div class="p-3 rounded shadow-sm d-flex justify-content-between align-items-center" style="background-color: #ffff;">
            <div>
                <div class="d-flex align-items-center">
                    <i class="bi bi-people-fill fs-4 ms-2" style="color: #7514C0;"></i>
                    <span class="card-text">إجمالي العملاء</span>
                </div>
                <div class="fs-3 move-number-right">278</div>
            </div>
            <div class="d-flex flex-column align-items-end move-rate-left">
                <div class="badge rounded px-3 py-2 text-white fw-bold mb-1" style="background-color: #7514C0;">
                    <i class="bi bi-arrow-up-right"></i> +12%
                </div>
                <div class="card-text-small mt-1 m-0 p-0" style="color: #515151">مقارنة بالأسبوع الماضي</div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
<style>
     body, * {
        font-family: 'Almarai', sans-serif;
    }
    .icon-style { 
        font-size: 2rem; }
    .card-custom {
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        border-radius: 10px;
        padding: 20px;
    }
    .card-text-small {
        font-size: 10px;
        margin-left:50px;
        color: #515151;
    }
    .card-text {
        font-size: 18px;
        color: #515151;
    }
    body {
        background-color: #F7F8FA;
    }
    .move-number-right {
        margin-right: 26px; 
        color: #7514C0; 
    }
    .move-rate-left {
        margin-left: 9px; 
    }
    .daterangepicker .ranges {
    direction: rtl;
    text-align: right;
    float: right !important;
}
.daterangepicker .ranges ul {
    padding-right: 0 !important;
}
.daterangepicker .ranges li {
    text-align: right !important;
}
#daterange, #client-daterange, #supplier-daterange , #top-cities-daterange, #top-suppliers-daterange {
    padding-right: 34px !important;
    font-size: 13px;
}
#supplier-tooltip {
  transition: all 0.1s ease;
  z-index: 9999;
}
#client-tooltip {
  transition: all 0.1s ease;
  z-index: 9999;
}
  .top-table {
  font-family: 'Almarai';
  font-size: 14px;
  border-right: 1px solid #e0e0e0;
  border-left: 1px solid #e0e0e0;
  border-collapse: separate;
  border-spacing: 0;
   border-radius: 10px; 
  overflow: hidden; 
  width: 100%;      
  min-width: 320px; 
  max-width: 640px; 
  }
.top-table th,
.top-table td {
  text-align: center;        
  vertical-align: middle;    
  font-size: 15px;          
  padding: 14px 16px;        
  border-top: 1px solid #eee;
}
.top-table th {
  background-color: #250059;
  color: #fff;
  font-weight: bold;
}
.top-table tr {
  transition: background 0.2s;
}
.top-table tbody tr:hover {
  background-color: #f6f6fa; 
}
.top-table tbody tr:first-child td,
.top-table tbody tr:first-child th {
  color: #333 !important;
}
  .client-pill {
    display: inline-block;
    background-color: #f5f5f5;
    border-radius: 12px;
    padding: 4px 10px;
    margin-left: 6px;
    font-size: 13px;
    color: #444;
  }
 .rank-circle {
  display: inline-block;
  width: 22px;
  height: 22px;
  border-radius: 50%;
  text-align: center;
  font-size: 12px;
  font-weight: bold;
  line-height: 22px;
  margin-left: 6px;
  border: 1px solid #ccc;
}
.rank-1 {
  color: #DAA520;
  border-color: #DAA520;
  background-color: #fff8e1;
}
.rank-2 {
  color: #888;
  border-color: #888;
  background-color: #f2f2f2;
}
.rank-3 {
  color: #b87333;
  border-color: #b87333;
  background-color: #fff1e5;
}
.highcharts-tooltip {
  box-shadow: none !important;
  filter: none !important;
  background: #fff !important;
  border: none !important;
}
.highcharts-tooltip > span, 
.highcharts-tooltip > div {
  box-shadow: none !important;
  filter: none !important;
  background: #fff !important;
  border: none !important;
}
.highcharts-tooltip text {
  filter: none !important;
}
.dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: inline-block;
        margin-inline-end: 6px;
    }
.chart-legend {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 8px;
        font-size: 12px;
        color: #666;
    }
.supplier-legend-label {
    font-size: 12px;
}
</style>
@endpush
@push('scripts')
<script>
    $(function () {
       // 1. رسم شارت إجمالي الطلبات
    const ctx = document.getElementById('ordersChart').getContext('2d');
    const ordersChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['May 01', 'May 02', 'May 03', 'May 04', 'May 05', 'May 06', 'May 07', 'May 08', 'May 09', 'May 10', 'May 11'
            , 'May 12', 'May 13', 'May 14', 'May 15', 'May 16', 'May 17', 'May 18', 'May 19' , 'May 20' , 'May 21', 'May 22', 'May 23' ,
             'May 24', 'May 25', 'May 26', 'May 27', 'May 28', 'May 29', 'May 30'],
            datasets: [{
                label: 'Total Orders',
                data: [30, 60, 130, 100, 90, 105, 125, 55, 75, 115, 110, 150, 135, 100, 115, 95,
                    85, 120, 140, 130, 110, 105, 95, 80, 70, 60, 50, 40, 30, 20],
                backgroundColor: '#7514C0',
                borderRadius: 4,
                barThickness: 18,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: {
    enabled: false, // نعطل التولتيب العادي
    external: function(context) {
        let tooltipModel = context.tooltip;
        // التحقق أو إنشاء العنصر
        let tooltipEl = document.getElementById('custom-tooltip');
        if (!tooltipEl) {
            tooltipEl = document.createElement('div');
            tooltipEl.id = 'custom-tooltip';
            tooltipEl.innerHTML = '<div class="custom-tooltip-inner shadow-sm"></div>';
            document.body.appendChild(tooltipEl);
        }
        // إذا ما فيه بيانات نخفي التولتيب
        if (tooltipModel.opacity === 0) {
            tooltipEl.style.opacity = 0;
            return;
        }
        const dataPoint = tooltipModel.dataPoints[0];
        const value = dataPoint.formattedValue;
        const label = dataPoint.label;
        const date = new Date(`${label} 2025`);
        const weekday = date.toLocaleDateString('ar-EG', { weekday: 'long' });
       const month = date.toLocaleDateString('ar-EG', {month: 'long' });
       const day = date.toLocaleDateString('EG', { day: 'numeric'});
        tooltipEl.querySelector('.custom-tooltip-inner').innerHTML = `
            <div style="padding:7px 9px; background:white; border:1px solid #eee; border-radius:10px; min-width:40px;">
                <div class="d-flex align-items-center mb-1">
                    <i class="bi-bar-chart" style="color:#7514C0; font-size: 16px; margin-left: 6px;margin-top:-7px;"></i>
                    <span style="font-weight:bold; color:gray;font-size: 10px;">إجمالي الطلبات</span>
                </div>
                <div style="font-size: 15px; font-weight: bold; text-align:center; color:#7514C0;">${value}</div>
                <div style="font-size:10px; color:gray; text-align:center;">${weekday}، ${day} ${month}</div>
            </div>`;
        const position = context.chart.canvas.getBoundingClientRect();
        tooltipEl.style.opacity = 1;
        tooltipEl.style.position = 'absolute';
        tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
        tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
        tooltipEl.style.pointerEvents = 'none';
    }
}
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: {
                        font: { family: 'Almarai', size: 12 },
                        color: '#666'
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: { color: '#f0f0f0' },
                    ticks: {
                        font: { family: 'Almarai', size: 12 },
                        color: '#666'
                    }
                }
            }
        }
    });
     // 2. رسم شارت الموردين
const supplierChartCtx = document.getElementById('supplierChart').getContext('2d');
const supplierChart = new Chart(supplierChartCtx, {
    type: 'bar',
    data: {
        labels: ['Rodud', 'Al Majdouie', 'Supplier A', 'Supplier B', 'Supplier C'],
        datasets: [
            {
                label: 'تم الطلب',
                data: [4000, 3000, 2000, 3200, 900],
                backgroundColor: '#7514C0',
                borderRadius: 7,
                barThickness: 16,
            },
            {
                label: 'مكتملة',
                data: [3900, 2700, 1800, 1200, 800],
                backgroundColor: '#88C4A3',
                borderRadius: 7,
                barThickness: 16,
            }
        ]
    },
    options: {
        indexAxis: 'y',
        responsive: false,
        plugins: {
            legend: {
                display: true,
                position: 'top',
                labels: {
                    font: { family: 'Almarai', size: 12 },
                    color: ' #515151',
                    usePointStyle: true,
                    pointStyle: 'circle',
                    padding: 50
                }
            },
            tooltip: {
                enabled: false,
                external: function(context) {
                    let tooltipEl = document.getElementById('supplier-tooltip');

                    // أنشئ التولتيب إذا ما كان موجود
                    if (!tooltipEl) {
                        tooltipEl = document.createElement('div');
                        tooltipEl.id = 'supplier-tooltip';
                        tooltipEl.style.position = 'absolute';
                        tooltipEl.style.background = '#fff';
                        tooltipEl.style.border = '1px solid #ddd';
                        tooltipEl.style.borderRadius = '10px';
                        tooltipEl.style.padding = '10px';
                        tooltipEl.style.boxShadow = '0 4px 8px rgba(0,0,0,0.1)';
                        tooltipEl.style.pointerEvents = 'none';
                        tooltipEl.style.fontFamily = 'Almarai, sans-serif';
                        document.body.appendChild(tooltipEl);
                    }

                    const tooltipModel = context.tooltip;

                    if (tooltipModel.opacity === 0) {
                        tooltipEl.style.opacity = 0;
                        return;
                    }

                    const dataPoints = tooltipModel.dataPoints;
                    const title = tooltipModel.title[0];
                      let html = `
        <div style="font-size: 13px; font-weight: bold; margin-bottom: 8px; display: flex; align-items: center; gap: 6px;">
            <i class="bi bi-diagram-3-fill" style="color:#7514C0;"></i>
            <span>${title}</span>
        </div>`;

                    dataPoints.forEach(dp => {
                        html += `
                            <div style="display: flex; align-items: center; gap: 6px; margin-bottom: 4px;">
                                <div style="width: 10px; height: 10px; border-radius: 50%; background: ${dp.dataset.backgroundColor};"></div>
                                <span style="font-weight:bold; color:gray;font-size: 10px;">${dp.dataset.label}:</span>
                                <span style="font-size: 13px; font-weight: bold; color: ${dp.dataset.backgroundColor};">${dp.raw}</span>
                            </div>`;
                    });
                    tooltipEl.innerHTML = html;
                    const position = context.chart.canvas.getBoundingClientRect();
                    tooltipEl.style.opacity = 1;
                    tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX - 15 + 'px';
                    tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY - 10 + 'px';
                }
            }
        },
        layout: {
            padding: {
                top: -47,
                bottom: 10
            }
        },
        scales: {
            x: {
                display: false,
                grid: { display: false }
            },
            y: {
                grid: { display: true },
                ticks: {
font: { family: 'Almarai', size: 12 },
                    color: ' #515151'
                }
            }
        }
    }
});
// 3. رسم شارت العملاء
const clientChartCtx = document.getElementById('clientChart').getContext('2d');
const clientChart = new Chart(clientChartCtx, {
    type: 'bar',
    data: {
        labels: ['Rodud', 'Al Majdouie', 'Supplier A', 'Supplier B', 'Supplier C'],
        datasets: [
            {
                label: 'عدد الطلبات',
                data: [4000, 3000, 2000, 3200, 900],
                backgroundColor: '#7514C0',
                borderRadius: 7,
                barThickness: 16,
            }
        ]
    },
    options: {
        indexAxis: 'y',
        responsive: false,
        plugins: {
            legend: {
                display: false,
                position: 'top',
                labels: {
                    font: { family: 'Almarai', size: 12 },
                    color: ' #515151',
                    usePointStyle: true,
                    pointStyle: 'circle',
                    padding: 50
                }
            },
            tooltip: {
    enabled: false,
    external: function(context) {
        let tooltipEl = document.getElementById('client-tooltip');

        if (!tooltipEl) {
            tooltipEl = document.createElement('div');
            tooltipEl.id = 'client-tooltip';
            tooltipEl.style.position = 'absolute';
            tooltipEl.style.background = '#fff';
            tooltipEl.style.border = '1px solid #ddd';
            tooltipEl.style.borderRadius = '10px';
            tooltipEl.style.padding = '10px';
            tooltipEl.style.boxShadow = '0 4px 8px rgba(0,0,0,0.1)';
            tooltipEl.style.pointerEvents = 'none';
            tooltipEl.style.fontFamily = 'Almarai, sans-serif';
            document.body.appendChild(tooltipEl);
        }

        const tooltipModel = context.tooltip;

        if (tooltipModel.opacity === 0) {
            tooltipEl.style.opacity = 0;
            return;
        }

        const dataPoints = tooltipModel.dataPoints;
        const title = tooltipModel.title[0];

        let html = `
        <div style="font-size: 13px; font-weight: bold; margin-bottom: 8px; display: flex; align-items: center; gap: 6px;">
            <i class="bi bi-people-fill" style="color:#7514C0;"></i>
            <span>${title}</span>
        </div>`;

        dataPoints.forEach(dp => {
            html += `
                <div style="display: flex; align-items: center; gap: 6px; margin-bottom: 4px;">
                    <div style="width: 10px; height: 10px; border-radius: 50%; background: ${dp.dataset.backgroundColor};"></div>
                    <span style="font-weight:bold; color:gray;font-size: 10px;">${dp.dataset.label}:</span>
                    <span style="font-size: 13px; font-weight: bold; color: ${dp.dataset.backgroundColor};">${dp.raw.toLocaleString()}</span>
                </div>`;
        });

        tooltipEl.innerHTML = html;

        const position = context.chart.canvas.getBoundingClientRect();
        tooltipEl.style.opacity = 1;
        tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 15 + 'px';
        tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY - 10 + 'px';
    }
}
        },
        layout: {
            padding: {
                top: 26,
                bottom: 10
            }
        },
        scales: {
            x: {
                display: false,
                grid: { display: false }
            },
            y: {
                grid: { display: true },
                ticks: {
                    font: { family: 'Almarai', size: 12 },
                    color: ' #515151'
                }
            }
        }
    }
});
// 4. رسم خريطة السعودية 
Highcharts.mapChart('sa-map-container', {
  chart: {
    map: 'countries/sa/sa-all',
    backgroundColor: '#fff',
    borderRadius: 6,
    style: {
      fontFamily: 'Almarai, sans-serif'
    }
  },
  title: { text: '' },
  subtitle: { text: '' },
  mapNavigation: { enabled: false },
  credits: { enabled: false },
  exporting: { enabled: false },
  legend: { enabled: false },
 tooltip: {
  useHTML: true,
  formatter: function () {
    const point = this.point;
    const icon = `<i class="bi bi-geo-fill" style="color:#7514C0; font-size:18px; margin-right:6px;"></i>`;
let html = `
  <div style="font-family: Almarai, sans-serif; direction: rtl; text-align: right; padding: 10px 0 10px 0; min-width: 220px; max-width: 600px; border-radius:7px;">
    <div style="display: flex; align-items: center; margin-bottom: 12px;">
    ${icon}
      <span style="font-size: 16px; font-weight: 700;">${point.name}</span>
    </div>
    <div style="color: #888; font-size: 11px; margin-bottom: 8px;">إجمالي الطلبات</div>
    <div style="font-size: 18px; font-weight: bold; color: #7514C0; margin-bottom: 0;">
      ${point.value || 0}
    </div>
    <div style="height:1px; width:100%; background:#e0e0e0; margin:10px 0 14px 0; padding:0;"></div>`;
    if (point.details) {
      const entries = Object.entries(point.details);
      html += `<div style="display: grid; grid-template-columns: repeat(3, 1fr); row-gap: 10px; font-size: 13px; text-align: center;">`;
      for (const [city, value] of entries) {
        html += `
          <div>
            <div style="font-weight: bold; color: #7514C0;">${value}</div>
            <div style="font-size: 10px; color: #666;">${city}</div>
          </div>`;
      }
      html += `</div>`;
    }
    html += `</div>`;
    return html;
  }
},
  colorAxis: {
    min: 0,
    max: 250,
    stops: [
      [0, '#F2E6FB'],
      [0.3, '#C69DF2'],
      [0.6, '#9B5DD9'],
      [1, '#7514C0']
    ]
  },
  series: [{
    data: [
      {
        'hc-key': 'sa-ri', name: 'منطقة الرياض', value: 150,
        details: {
          'الرياض': 98,
          'الخرج': 21,
          'المجمعة': 8,
          'الزلفي': 7,
          'وادي الدواسر': 5,
          'الدرعية': 2
        }
      },
      {
        'hc-key': 'sa-md', name: 'منطقة المدينة', value: 110,
        details: {
          'المدينة': 60,
          'ينبع': 25,
          'العلا': 15,
          'بدر': 10
        }
      },
      {
        'hc-key': 'sa-mk', name: 'منطقة مكة', value: 130,
        details: {
          'مكة': 40,
          'جدة': 35,
          'الطائف': 30,
          'رابغ': 15,
          'خليص': 10
        }
      },
      {
        'hc-key': 'sa-sh', name: 'منطقة الشرقية', value: 115,
        details: {
          'الدمام': 60,
          'الخبر': 35,
          'القطيف': 20
        }
      }
    ],
    joinBy: 'hc-key',
    name: 'عدد الطلبات',
    states: {
      hover: { brightness: 0.15 }
    },
    dataLabels: { enabled: false },
    borderColor: '#fff',
    borderWidth: 1
  }]
});
// 5. رسم الدوائر الصغيرة للموردين 
Chart.register({
  id: 'centerText',
  beforeDraw: function(chart) {
    if (chart.config.options.elements && chart.config.options.elements.center) {
      let ctx = chart.ctx;
      let centerConfig = chart.config.options.elements.center;
      let fontStyle = centerConfig.fontStyle || 'Almarai';
      let txt = centerConfig.text;
      let color = centerConfig.color || '#000';
      let maxFontSize = centerConfig.maxFontSize || 18;
      let sidePadding = centerConfig.sidePadding || 20;
      let sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2);
      ctx.font = "30px " + fontStyle;
      let stringWidth = ctx.measureText(txt).width;
      let elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;
      let widthRatio = elementWidth / stringWidth;
      let newFontSize = maxFontSize;
      ctx.textAlign = 'center';
      ctx.textBaseline = 'middle';
      ctx.font = newFontSize + "px " + fontStyle;
      ctx.fillStyle = color;
      let centerX = (chart.chartArea.left + chart.chartArea.right) / 2;
      let centerY = (chart.chartArea.top + chart.chartArea.bottom) / 2;
      ctx.fillText(txt, centerX, centerY);
    }
  }
});
const circleOptions = (completed, total, color, labelText) => {
  const percentage = (completed / total) * 100;
  return {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [percentage, 100 - percentage],
        backgroundColor: [color, '#e4e4e4'],
        borderWidth: 0,
      }]
    },
    options: {
      cutout: '80%',
      responsive: false,
      plugins: {
        legend: { display: false },
        tooltip: { enabled: false }
      },
      elements: {
        center: {
          text: labelText,
          color: ' #515151',
          fontStyle: 'Almarai',
          maxFontSize: 16
        }
      }
    }
  };
};
const data = [
  { id: 1, trips: 1201, totalTrips: 1300, pod: 1101, totalPod: 1200, payment: 987, totalPayment: 1050 },
  { id: 2, trips: 1100, totalTrips: 1250, pod: 980, totalPod: 1150, payment: 870, totalPayment: 1000 },
  { id: 3, trips: 1020, totalTrips: 1150, pod: 940, totalPod: 1100, payment: 820, totalPayment: 950 },
  { id: 4, trips: 900, totalTrips: 1000, pod: 860, totalPod: 950, payment: 790, totalPayment: 900 },
];
data.forEach(item => {
  new Chart(document.getElementById('tripsChart' + item.id), circleOptions(item.trips, item.totalTrips, '#250059', item.trips.toLocaleString()));
  new Chart(document.getElementById('podChart' + item.id), circleOptions(item.pod, item.totalPod, '#489C7B', item.pod.toLocaleString()));
  new Chart(document.getElementById('paymentChart' + item.id), circleOptions(item.payment, item.totalPayment, '#7514C0', item.payment.toLocaleString()));
});
// 6. خيارات فلتر التاريخ الموحد لجميع الفلاتر
const isArabic = document.documentElement.lang === 'ar' || document.documentElement.dir === 'rtl';
 const commonDatePickerOptions = {
        opens: isArabic ? 'left' : 'right',
        autoUpdateInput: false,
        locale: {
            format: 'MMM D, YYYY',
            applyLabel: 'تطبيق',
            cancelLabel: 'إلغاء',
            customRangeLabel: 'نطاق مخصص',
            daysOfWeek: ['أحد', 'اثنين', 'ثلاثاء', 'أربعاء', 'خميس', 'جمعة', 'سبت'],
            monthNames: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو',
                'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'],
            firstDay: 6
        },
        ranges: {
            'اليوم': [moment(), moment()],
            'أمس': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'آخر 7 أيام': [moment().subtract(6, 'days'), moment()],
            'آخر 30 يوم': [moment().subtract(29, 'days'), moment()],
            'هذا الشهر': [moment().startOf('month'), moment().endOf('month')],
            'الشهر الماضي': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    };
    // 7. دوال تحديث بيانات الشارتات عند تغيير التاريخ
    // دالة تحديث شارت الطلبات
    function updateOrdersChart(startDate, endDate) {
        const labels = [];
        const data = [];
        let current = moment(startDate);
        while (current.isSameOrBefore(endDate)) {
            labels.push(current.format('MMM DD'));
            data.push(Math.floor(Math.random() * 150) + 30);
            current.add(1, 'day');
        }
        ordersChart.data.labels = labels;
        ordersChart.data.datasets[0].data = data;
        ordersChart.update();
    }
    // دالة تحديث شارت الموردين
    function updateSupplierChart(startDate, endDate) {
        if (endDate.isAfter(moment())) endDate = moment();
        const labels = ['Rodud', 'Al Majdouie', 'Supplier A', 'Supplier B', 'Supplier C'];
        const orderedData = [];
        const completedData = [];
        for (let i = 0; i < labels.length; i++) {
            orderedData.push(Math.floor(Math.random() * 3000) + 500);
            completedData.push(Math.floor(Math.random() * 2000) + 300);
        }
        supplierChart.data.labels = labels;
        supplierChart.data.datasets[0].data = orderedData;
        supplierChart.data.datasets[1].data = completedData;
        supplierChart.update();
    }
    // دالة تحديث شارت العملاء
    function updateClientChart(startDate, endDate) {
        if (endDate.isAfter(moment())) endDate = moment();
        const labels = ['Client A', 'Client B', 'Client C', 'Client D', 'Client E'];
        const data = [];
        for (let i = 0; i < labels.length; i++) {
            data.push(Math.floor(Math.random() * 2000) + 400);
        }
        clientChart.data.labels = labels;
        clientChart.data.datasets[0].data = data;
        clientChart.update();
    }
    // 8. ربط فلاتر التاريخ بالشارتات والجداول
    // ربط فلتر الطلبات
    $('#daterange').daterangepicker(commonDatePickerOptions, function(start, end, label) {
        $('#daterange').val(label === 'اليوم' || label === 'أمس' ? start.format('MMM D, YYYY') : `${start.format('MMM D, YYYY')} - ${end.format('MMM D, YYYY')}`);
        updateOrdersChart(start, end);
    }).on('show.daterangepicker', function () {
        if (!$(this).val()) $(this).val(moment().format('MMM D, YYYY'));
    });
    // ربط فلتر الموردين
    $('#supplier-daterange').daterangepicker(commonDatePickerOptions, function(start, end, label) {
        $('#supplier-daterange').val(label === 'اليوم' || label === 'أمس' ? start.format('MMM D, YYYY') : `${start.format('MMM D, YYYY')} - ${end.format('MMM D, YYYY')}`);
        updateSupplierChart(start, end);
    }).on('show.daterangepicker', function () {
        if (!$(this).val()) $(this).val(moment().format('MMM D, YYYY'));
    });
    // ربط فلتر العملاء
    $('#client-daterange').daterangepicker(commonDatePickerOptions, function(start, end, label) {
        $('#client-daterange').val(label === 'اليوم' || label === 'أمس' ? start.format('MMM D, YYYY') : `${start.format('MMM D, YYYY')} - ${end.format('MMM D, YYYY')}`);
        updateClientChart(start, end);
    }).on('show.daterangepicker', function () {
        if (!$(this).val()) $(this).val(moment().format('MMM D, YYYY'));
    });
    //  ربط فلاتر المدن والموردين الأعلى
    $('#top-cities-daterange, #top-suppliers-daterange').each(function () {
        const input = $(this);
        input.daterangepicker(commonDatePickerOptions, function(start, end, label) {
            input.val(label === 'اليوم' || label === 'أمس' ? start.format('MMM D, YYYY') : `${start.format('MMM D, YYYY')} - ${end.format('MMM D, YYYY')}`);
        }).on('show.daterangepicker', function () {
            if (!input.val()) input.val(moment().format('MMM D, YYYY'));
        });
    });

});
</script>
@endpush