<?php
/**
 * Template Name: Policy
 */
?>
<?php get_header(); ?>

<div class="container">
    
    <?php
    // Способ 1: Полный текст в одном поле
    if (get_field('policy_full_content')):
        echo '<div class="policy-content-full">';
        echo get_field('policy_full_content');
        echo '</div>';
    endif;
    ?>

<?php
// Получаем PDF файл из ACF
$pdf_file = get_field('policy_pdf_file');

if ($pdf_file):
    // Получаем имя файла для атрибута download
    $file_name = basename($pdf_file);
?>
<button type="button" 
        class="download-policy-btn" 
        data-pdf-url="<?php echo esc_url($pdf_file); ?>"
        data-file-name="<?php echo esc_attr($file_name); ?>">
    <img src="<?php echo get_template_directory_uri(); ?>/Assets/image/Document.png" alt="document">
    <span class="button_text_mobile">скачать файл политики</span>
    <span class="button_text">Файл политики конфиденциальности</span>
</button>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const downloadBtn = document.querySelector('.download-policy-btn');
    
    if (downloadBtn) {
        downloadBtn.addEventListener('click', function() {
            const pdfUrl = this.getAttribute('data-pdf-url');
            const fileName = this.getAttribute('data-file-name');
            
            // Создаем временную ссылку для скачивания
            const link = document.createElement('a');
            link.href = pdfUrl;
            link.download = fileName;
            link.target = '_blank';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            // Можно добавить анимацию или статистику
            console.log('Файл скачивается:', fileName);
        });
    }
});
</script>
<?php endif; ?>



</div>

<?php get_footer(); ?>