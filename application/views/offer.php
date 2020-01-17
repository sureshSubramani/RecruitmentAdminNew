
<body>
    <div class='container'>

        <?php 
        //$this->db->where("status",1);
        $this->db->where('personal_id', $personal_id);
        $this->db->from(TEAMDATA.' as t');
        $this->db->join(DEPARTMENTS.' as d', 't.dept_name = d.id');
        
        $personal = $this->db->get()->result();                                                                  
        foreach($personal as $value){ ?>
        <div class='row'>
            <div class='col-lg-12' style='padding-top:70px;'>
                <h4 class='name-title' style='line-height: 0px !important;'> Mr. <?php echo $value->full_name; ?> </h4>
                <h4 class='name-title' style='line-height: 5px !important; font-weight:500;'>Department of <?php echo $value->dept_name; ?> </h4>
            </div>
        </div>
        <div class='row' style='margin-top:20px;'>
            <div class='col-lg-12'>
                <h4 style='line-height: 0px !important; font-weight:500;'><span class='name-title'>Sub:</span> Establishment of <span class='name-title'> <b>Mr. <?php echo $value->full_name; ?></b> </span>
                    Assistant Profesor - Mahendra Arts & Science College- reg.</h4>
                <h4 style='line-height: 0px !important; font-weight:500;'><span class='name-title'>Ref:</span> Your application dated <?php echo date('d.m.Y'); ?> and the subsequent interview on
                    <?php echo date('d.m.Y'); ?> -reg.  </h4>
            </div>
        </div>

        <div class='row' style='margin-top:20px;'>
            <div class='col-lg-12'>
                <h4 class='name-title' style='line-height: 0px !important;'>Madam,</h3>
                <h4 class='name-title' style='line-height: 30px !important; text-indent: 70px; font-weight:500; text-align: justify;'>The management is pleased to inform you that you are appointed Assistant Professor of
                    <span class='name-title'><b><?php echo $value->dept_name; ?></b></span>. You will be on probation for one
                    year. During the probationary period, you are entitled to avail 12 datys of casual leave. Your
                    services will be confirmed of successful completion of your probation. You are requested to report
                    to duty on or before <?php echo date('d.m.Y'); ?>, failing which this appointment stands cancelled.</h4>

                    <h4 class='name-title' style='line-height: 30px !important; text-indent: 50px; font-weight:500; text-align: justify;'>However, your services may be terminated either with 3 month's notice or with three month's salary in lieu thereof on either side.</h4>
                    <h4 class='name-title' style='line-height: 30px !important; text-indent: 50px; font-weight:500; text-align: justify;'>The management whishes you long and successful carreer. </h4>
            </div>                
        </div>
        <div class='row1' style='margin-top:100px; margin-top:150px;'>                          
                <div class='text-left'>
                    <h4><span class='name-title'>Place:</span> Kalipatti</h4>
                    <h4><span class='name-title'>Date:</span> <?php echo date('Y/m/d'); ?></h4>
                    <h4><span class='name-title'>Copy To:</span> Principal </h4> 
                </div>
                <div class='text-right'>
                <h4 class='name-title'>CHAIRMAN</h4>                  
                </div>               
        </div>

        <?php } ?>
    </div>

</body>