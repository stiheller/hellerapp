    {{-- stock cero --}}
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thermometer-full"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Stock Cero</span>
                <span class="info-box-number">{{ $stockCero }}</span>
            </div>
        </div>
    </div>
    {{-- ptoCritico --}}
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-thermometer-half"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">PtoCritico</span>
                <span class="info-box-number">{{ $ptoCritico }}</span>
            </div>
    
        </div>
    </div>
    {{-- stock Mayor a Cero --}}
    
    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thermometer-empty"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Mayor a Cero</span>
                <span class="info-box-number">{{ $stockUp }}</span>
            </div>
    
        </div>
    </div>
    
 {{-- Bloqueados --}}
    
 <div class="clearfix hidden-md-up"></div>
 <div class="col-12 col-sm-6 col-md-3">
     <div class="info-box mb-3">
         <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-lock"></i></span>
         <div class="info-box-content">
             <span class="info-box-text">Bloqueados</span>
             <span class="info-box-number">{{ $bloqueados }}</span>
         </div>
 
     </div>
 </div>
 
    
