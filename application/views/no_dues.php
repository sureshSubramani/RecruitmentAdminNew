<link rel='stylesheet' href='assets/build/css/pdf.css' />

<body>
    <div class='container'>
        <div class='row'>
            <div class="column_logo">
                <img src='assets/build/images/logo.jpg' alt='logo' class='img-fluid' style='width:200px;' />
            </div>
            <div class="column">
                <h3 class='title'>MAHENDRA ARTS & SCIENCE COLLEGE, KALIPPATTI</h3>
                <p class="modal-title">(NAAC Accredited with "A" Grade | Autonomous |<br />
                    Recognized under section 2(F) & 12(B) of the UGC Act 1986)</p>
                <h4 style='margin-top:5px; font-weight:bold'><u>No Dues Sheet</u></h4>
            </div>
        </div>
        <?php 
        //$this->db->where("status",1);
        $this->db->where('personal_id', $personal_id);
        $this->db->from(PERSONAL.' as p');
        $this->db->join(DEPARTMENTS.' as d', 'p.department = d.id');
        //$this->db->join(TEAMDATA.' as t', 't.department = d.id');
        
        $personal = $this->db->get()->result();                                                                  
        foreach($personal as $value){ ?>
        <div class="row">
        <table class='table1' style='margin-bottom:20px;'>
                <tr>
                    <td>Full Name: <?php echo $value->first_name." ".$value->last_name;?></td>
                </tr>
                <tr>
                 <td>Mobile: <?php echo $value->phone_no;?></td>
                </tr>
                <tr>
                <td>Department: <?php echo $value->dept_name; ?></td>
        </tr>
            </table>
            <div class='divCard'>
                <table class='table scroeCard'>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php } ?>
    </div>

</body>