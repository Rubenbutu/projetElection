
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>nomDuParti</span></strong>. Tous droits Reservés
        </div>
        <div class="credits">

            Designed by <a href="">Ruben Butu</a>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>
    
    
    <script src="../js/Chart.min.js"></script>
    
    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="script.js"></script>
    <script src="../assets/js/script.js"></script>


    <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@8.0.1/dist/umd/simple-datatables.min.js"></script> -->

    <!-- Vendor JS Files -->
 
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script src="Chart.min.js"></script>
    <script>
    const config = {
    search: true, // Toggle search feature. Default: false
    creatable: false, // Creatable selection. Default: false
    clearable: false, // Clearable selection. Default: false
    maxHeight: '360px', // Max height for showing scrollbar. Default: 360px
    size: '', // Can be "sm" or "lg". Default ''
}
dselect(document.querySelector('#cmbP'), config)
dselect(document.querySelector('#cmbSc'), config)
dselect(document.querySelector('#cmbSce'), config)
dselect(document.querySelector('#cmbSb'), config)
dselect(document.querySelector('#cmbSpro'), config)
    // dselect(document.querySelector('#dselect-example'))
</script>

    <script>
// document.addEventListener('DOMContentLoaded', () => {

          /**
   * Animation on scroll function and init
   */
  function aos_init() {
    AOS.init({
      duration: 800,
      easing: 'slide',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', () => {
    aos_init();
  });

  
const barCanvas = document.getElementById('barCanvas');


new Chart(barCanvas, {
    type: 'bar',
    data: {
        // Les lables peuvent etre les elements d'une colone d'une base de table
        labels:<?= json_encode($nom)?>,
        datasets: [{
            label: 'mon graph',
            borderColor: ['#36A2EB', '#36A211', '#36A200', '#36A2A1'],
            backgroundColor: ['crimson', 'lightgreen', 'lightblue', 'violet'],
            data: <?= json_encode($pourcent)?>,
            fill: false,
            tension: 0.1,
            // lesmouvement au survol
            hoverOffset: 4,
            borderWidth: 1
        }]
    },
    options: {
        elements: {
            point: {
                pointBorderColor: "#333"
            }
        },

        scales: {
            y: {
                tiks: {
                    color: "#333"
                },
                suggestedMin: 0,
                suggestedMax: 50
            },
            x: {
                ticks: {
                    color: "#333"
                }
            }
        }
    }
});
        
const lineCanvas = document.getElementById('lineCanvas');


new Chart(lineCanvas, {
    type: 'line',
    data: {
        // Les lables peuvent etre les elements d'une colone d'une base de table
        labels:<?= empty(($prov))? 0:json_encode($prov) ?>,
        datasets: [{
            label: 'mon graph',
            borderColor: ['#36A2EB', '#36A211', '#36A200', '#36A2A1'],
            backgroundColor: ['crimson', 'lightgreen', 'lightblue', 'violet'],
            data: <?= empty(($voix))? 0:json_encode($voix) ?>,
            fill: false,
            tension: 0.1,
            // lesmouvement au survol
            hoverOffset: 4,
            borderWidth: 1
        }]
    },
    options: {
        elements: {
            point: {
                pointBorderColor: "#333"
            }
        },

        scales: {
            y: {
                tiks: {
                    color: "#333"
                },
                suggestedMin: 0,
                suggestedMax: 50
            },
            x: {
                ticks: {
                    color: "#333"
                }
            }
        }
    }
});




       
// });
    </script>


</body>

</html>