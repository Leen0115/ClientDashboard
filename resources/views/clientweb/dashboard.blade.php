@extends('layouts.client') 
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<h2 class="mb-4" style="color:#00000;">لوحة البيانات</h2>
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
                <div class="card-text-small mt-1 m-0 p-0" style="color:#51515">مقارنة بالأسبوع الماضي</div>
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
                <div class="card-text-small mt-1 m-0 p-0" style="color:#51515">مقارنة بالأسبوع الماضي</div>
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
                <div class="card-text-small mt-1 m-0 p-0" style="color:#51515">مقارنة بالأسبوع الماضي</div>
            </div>
        </div>  
    </div>
</div>

<!-- نظرة عامة على إجمالي الطلبات -->
    <div class="col-12">
<div class="p-3 rounded shadow-sm" style="background-color: #fff;min-height: 400px;">
    <div class="d-flex justify-content-between align-items-start mb-1">
                <div>
                    <h5 class="fw-bold mb-1 mt-2">
                        <i class="bi bi-box-seam ms-2"></i>نظرة عامة على إجمالي الطلبات</h5>
                    <p class="text-muted small mb-0">
                        هذا المخطط يعرض العدد الإجمالي للطلبات على مدار الوقت، ويساعدك على تتبع الاتجاهات والفترات النشطة.
                    </p>
                </div>
                <div class="d-flex align-items-center">
                    <!-- التاريخ -->
   <div class="position-relative me-3" style="width:220px;">
    <!-- أيقونة التقويم -->
    <i class="bi bi-calendar-event-fill position-absolute" style="top: 50%; right: 12px; transform: translateY(-50%); color: #888;"></i>
    <!-- سهم -->
    <i class="bi bi-chevron-down position-absolute" style="top: 50%; left: 10px; transform: translateY(-50%); color: #888;"></i>
    <!-- date range -->
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
    <div class="row mt-3">
    <!-- قسم تحليلات الموردين -->
<div class="col-md-6">
    <div class="p-3 rounded shadow-sm min-height: 300px;" style="background-color: #fff;">
        <div class="d-flex justify-content-between align-items-start mb-2">
            <!-- العنوان والنص -->
            <div>
                <h5 class="fw-bold mb-1">
                    <i class="bi bi-diagram-3-fill ms-2"></i>تحليلات الموردين
                </h5>
                <p class="text-muted small mb-0">
                    هذا المخطط يعرض العدد الإجمالي للطلبات من قبل الموردين خلال الفترة المحددة، مما يساعد على تتبع الاتجاهات وفترات الذروة.
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
    <!-- قسم تحليلات العملاء -->
  <div class="col-md-6">
  <div class="p-3 rounded shadow-sm min-height: 600px;" style="background-color: #fff;">
    <div class="d-flex justify-content-between align-items-start mb-2">
      <!-- العنوان والنص -->
      <div>
        <h5 class="fw-bold mb-1">
          <i class="bi bi-people-fill ms-2"></i>تحليلات العملاء
        </h5>
        <p class="text-muted small mb-0">
          هذا المخطط يعرض العدد الإجمالي للطلبات من قبل العملاء خلال الفترة المحددة، مما يساعد على تتبع النشاط.
        </p>
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
          <div class="text-muted small">إجمالي الطلبات</div>
          <div class="fw-bold fs-5" style="color: #515151;">12,127</div>
        </div>
      </div>
    </div>
    <canvas id="clientChart" height="500" width="750"></canvas>
  </div>
</div>
</div>
<!-- أعلى المدن والعملاء -->
<div class="col-12 mt-3">
  <div class="p-3 rounded shadow-sm mb-4" style="background-color: #fff; min-height: 600px;">
    <div class="d-flex justify-content-between align-items-start flex-wrap">
      <!-- العنوان والوصف + التاريخ -->
      <div class="d-flex align-items-center gap-3">
        <div>
          <h5 class="fw-bold mb-1">
            <i class="bi bi-bar-chart-line-fill"></i> أعلى المدن/ مواقع العملاء التي تم التوصيل إليها
          </h5>
          <p class="text-muted small"style="max-width: 420px;">
يعرض هذا الرسم البياني العدد الإجمالي لطلبات الرحلات عبر الزمن، مما يساعدك على تتبّع اتجاهات الطلب وفترات الذروة.</p>
        </div>

        <!-- فلتر التاريخ -->
        <div class="position-relative" style="width: 227px; margin-top: -20px;">
          <i class="bi bi-calendar-event-fill position-absolute" style="top: 50%; right: 12px; transform: translateY(-50%); color: #888;"></i>
          <i class="bi bi-chevron-down position-absolute" style="top: 50%; left: 10px; transform: translateY(-50%); color: #888;"></i>
          <input type="text" id="top-cities-daterange" class="form-control form-control-sm pe-5 ps-4 text-end" placeholder="اختر نطاق التاريخ" style="background-color: #F6F7F9; cursor: pointer;" readonly />
        </div>
      </div>

      <!-- التلميح -->
      <div class="d-flex align-items-center flex-wrap gap-3 mt-3">
        <small class="text-muted" style="margin-left: 60px; font-size: 14px;">
          <i class="bi bi-info-circle me-1"></i> مرر المؤشر فوق الخريطة لعرض عدد الطلبات/الرحلات المكتملة إلى المنطقة/المدينة. 
        </small>
      </div>
    </div>

    <!-- جدول أعلى المدن والعملاء -->
    <div class="table-responsive mt-4" style="width: 45%; min-width: 320px;">
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
</div>
</div>
@endsection
@push('styles')
<style>
     body, * {
        font-family: 'Almrai', sans-serif;
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
#daterange, #client-daterange, #supplier-daterange , #top-cities-daterange {
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
  font-family: 'Almarai', sans-serif;
  font-size: 14px;
  border-right: 1px solid #e0e0e0;
  border-left: 1px solid #e0e0e0;
  border-collapse: separate;
  border-spacing: 0;
   border-radius: 10px; 
  overflow: hidden; 
  }
.top-table th,
.top-table td {
  text-align: center;         /* توسيط النص */
  vertical-align: middle;     /* توسيط عمودي */
  font-size: 15px;            /* حجم خط موحد */
  padding: 14px 16px;         /* تباعد داخلي أكبر */
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
  background-color: #f6f6fa; /* لون خفيف عند المرور */
}
.top-table tbody tr:first-child td,
.top-table tbody tr:first-child th {
  color: #333 !important;
}

  .top-table th,
  .top-table td {
    vertical-align: middle;
    padding: 12px 16px;
    border-top: 1px solid #eee;
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


</style>
@endpush
@push('scripts')
<script>
    $(function () {
        $('#daterange').val('');
        $('#daterange').daterangepicker({
    opens: 'left',
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
}, function (start, end, label) {
    let formatted = start.format('MMM D, YYYY');
    let formattedRange = `${formatted} - ${end.format('MMM D, YYYY')}`;
    
    // تحديث الحقل بناءً على الاختيار
    if (label === 'اليوم' || label === 'أمس') {
        $('#daterange').val(formatted);
    } else {
        $('#daterange').val(formattedRange);
    }
});

// نجبره يحدث التاريخ يدويًا أول مرة ينفتح
$('#daterange').on('show.daterangepicker', function(ev, picker) {
    if (!$(this).val()) {
        const today = moment().format('MMM D, YYYY');
        $(this).val(today);
    }
});
$('#supplier-daterange').daterangepicker({
        opens: 'left',
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
    }, function (start, end, label) {
        let formatted = start.format('MMM D, YYYY');
        let formattedRange = `${formatted} - ${end.format('MMM D, YYYY')}`;
        if (label === 'اليوم' || label === 'أمس') {
            $('#supplier-daterange').val(formatted);
        } else {
            $('#supplier-daterange').val(formattedRange);
        }
    });

    // تعيين التاريخ الافتراضي عند أول فتح
    $('#supplier-daterange').on('show.daterangepicker', function(ev, picker) {
        if (!$(this).val()) {
            const today = moment().format('MMM D, YYYY');
            $(this).val(today);
        }
    });
    $('#client-daterange').daterangepicker({
        opens: 'left',
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
    }, function (start, end, label) {
        let formatted = start.format('MMM D, YYYY');
        let formattedRange = `${formatted} - ${end.format('MMM D, YYYY')}`;
        if (label === 'اليوم' || label === 'أمس') {
            $('#client-daterange').val(formatted);
        } else {
            $('#client-daterange').val(formattedRange);
        }
    });

    // تعيين التاريخ الافتراضي عند أول فتح
    $('#client-daterange').on('show.daterangepicker', function(ev, picker) {
        if (!$(this).val()) {
            const today = moment().format('MMM D, YYYY');
            $(this).val(today);
        }
    });
    });
    $('#top-cities-daterange').daterangepicker({
    opens: 'left',
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
}, function (start, end, label) {
    let formatted = start.format('MMM D, YYYY');
    let formattedRange = `${formatted} - ${end.format('MMM D, YYYY')}`;
    if (label === 'اليوم' || label === 'أمس') {
        $('#top-cities-daterange').val(formatted);
    } else {
        $('#top-cities-daterange').val(formattedRange);
    }
});
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
        const day = date.toLocaleDateString('ar-EG', { day: 'numeric', month: 'long' });
        tooltipEl.querySelector('.custom-tooltip-inner').innerHTML = `
            <div style="padding:7px 9px; background:white; border:1px solid #eee; border-radius:10px; min-width:40px;">
                <div class="d-flex align-items-center mb-1">
                    <i class="bi-bar-chart" style="color:#7514C0; font-size: 16px; margin-left: 6px;margin-top:-7px;"></i>
                    <span style="font-weight:bold; color:gray;font-size: 10px;">إجمالي الطلبات</span>
                </div>
                <div style="font-size: 15px; font-weight: bold; text-align:center; color:#7514C0;">${value}</div>
                <div style="font-size:10px; color:gray; text-align:center;">${weekday}، ${day}</div>
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
                        font: { family: 'Almari', size: 12 },
                        color: '#666'
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: { color: '#f0f0f0' },
                    ticks: {
                        font: { family: 'Almari', size: 12 },
                        color: '#666'
                    }
                }
            }
        }
    });
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
                    color: '#515151',
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
            <i class="bi bi-people-fill" style="color:#7514C0;"></i>
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
                    color: '#515151'
                }
            }
        }
    }
});
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
                    color: '#515151',
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
                    color: '#515151'
                }
            }
        }
    }
});
</script>
@endpush