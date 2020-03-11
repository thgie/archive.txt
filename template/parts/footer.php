    </div>
</main>

<footer class="impressum">
    <div>
        <?php
            echo $Parsedown->text(file_get_contents('./conf/footer.md'));
        ?>
    </div>
    <div>
        made with 💖 and <a href="https://github.com/thgie/archive.txt/" target="_blank">archive.txt</a>
    </div>
</footer>
<script src="/template/assets/js/main.js"></script>

</body>
</html>