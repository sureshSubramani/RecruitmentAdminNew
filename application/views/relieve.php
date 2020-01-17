
<body>
    <div class='container'>

        <?php 
        $this->db->where('personal_id', $personal_id);
        $this->db->from(TEAMDATA.' as t');
        $this->db->join(DEPARTMENTS.' as d', 't.dept_name = d.id');
        
        $personal = $this->db->get()->result();                                                                  
        foreach($personal as $value){ ?>
        
            <!-- <div class='col-lg-12'>
                <table>
                    <tr>
                        <td>
                            <img src='assets/build/images/logo.jpg' alt='logo'
                                style="width: 120px; height: auto; display:inline-block; padding: 10px;"
                                class='img-responsive1' />
                        </td>
                        <td align='center'>
                            <h1 class='title'>MAHENDRA</h1>
                            <h1 class='sub-title-1'> ARTS & SCIENCE COLLEGE</h1>
                            <h1 class="sub-title-2">(Autonomous)</h1>
                        </td>
                        <td>
                            <img src='assets/build/images/mahendra_logo.jpg'
                                style="width: 120px; height: auto; display:inline-block; padding: 10px;" alt='logo'
                                class='img-responsive1' />
                        </td>
                    </tr>
                </table>
                
                <p class='prg-content'> Affiliated to Perriyar Univarnity, Salem | Accredited wth Grade 'A' by
                            NAACI |
                            Recognizad u/s 2(F) & 12(B) of the UGC Act 1956.</p>
                <hr />
                   
            </div>             -->
            <div class='row' style='padding-top:200px;'>
                <div class='col-lg-4 text-right'>
                    <h2>Date: <?php echo date('d.m.Y'); ?> </h2>                    
                </div> 
                <div class='col-lg-8 text-left'>
                    <h4 style='line-height: 50px !important; font-size:16px; !important'> MASC/Service/Certificate/<?php echo date('Y'); ?> </h4>
                    <h4 style="text-transform:uppercase; font-size:16px !important;"><span class='name-title'>Mr M.G.Bharath Kumar</span></h4>
                    <h4 style="text-transform:uppercase; font-size:16px !important;"><span class='name-title'>Chairman</span></h4>
                </div>                                                    
            </div>
            <div class='row' style='margin-top:30px;'>
                <div class='col-lg-12 text-center offset-xs-1' style='padding-left:50px; padding-right:50px;'>
                    <h4 style="font-size:18px !important;"><span class='name-title'>RELIVEING ORDER cum SERVICE CERTIFICATE</span></h4>
                </div>
            </div>
            <div class='row' style='margin-top:40px;'>
                <div class='col-lg-12'>
                    <p class='cer-prg'> This is certify that <span class='name-title'>Mr.<?php echo $value->full_name;?></span>
                        worked as Assistant Professor in the Department of
                        <span class='name-title'><?php echo $value->dept_name; ?></span> from
                        <strong><?php echo date('m.d.Y'); ?></strong> to
                        <strong><?php echo date('m.d.Y'); ?></strong>. He handled classes UG & PG Courses. He
                        was relieved of his duty on the afternoon of
                        <strong><?php echo date('m.d.Y'); ?></strong>. It is further certified that his contact
                        and character was good. </p>
                </div>
            </div>

            <div class='row' style='margin-top:100px; margin-bottom:200px;'> 
                <div class=' col-lg-12 text-right'>
                <h2 class='name-title'>CHAIRMAN</h2>                  
                </div>           
                <div class='col-lg-12 text-left'>
                    <h2><span class='name-title'>Place:</span> Kalipatti</h2>
                    <h2><span class='name-title'>Date:</span> <?php echo date('Y/m/d'); ?></h2>
                </div>                
            </div>
            <?php } ?>
        </div>

</body>