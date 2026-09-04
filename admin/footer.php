            </div> <!-- End container-fluid -->
        </div> <!-- End content -->
    </div> <!-- End wrapper -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });

        // Highlight active menu item
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll('#sidebar ul li a');
        const menuLength = menuItem.length;
        for (let i = 0; i < menuLength; i++) {
            if (menuItem[i].href === currentLocation) {
                menuItem[i].parentElement.classList.add("active");
            }
        }
    </script>
</body>
</html>
