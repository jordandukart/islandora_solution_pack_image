<?php

/**
 * @file
 * This is the template file for the object page for basic image
 *
 * @TODO: add documentation about file and available variables
*  @TODO: drupal_set_title shouldn't be called here
 */
?>

<?php if(isset($islandora_object_label)): ?>
  <?php drupal_set_title("$islandora_object_label"); ?>
<?php endif; ?>

<div class="islandora-basic-image-object islandora">
  <div class="islandora-basic-image-content-wrapper clearfix">
    <?php if (isset($islandora_medium_img)): ?>
      <div class="islandora-basic-image-content">
      <?php if (isset($islandora_full_url)): ?>
        <?php print l($islandora_medium_img, $islandora_full_url, array('html' => TRUE)); ?>
      <?php elseif (isset($islandora_medium_img)): ?>
        <?php print $islandora_medium_img; ?>
      <?php endif; ?>
      </div>
    <?php endif; ?>
  <div class="islandora-basic-image-sidebar">
    <?php if (isset($dc_array['dc:description']['value'])): ?>
      <h2><?php print $dc_array['dc:description']['label']; ?></h2>
      <p><?php print $dc_array['dc:description']['value']; ?></p>
    <?php endif; ?>
    <?php if ($parent_collections): ?>
      <div>
        <h2><?php print t('In collections'); ?></h2>
        <ul>
          <?php foreach ($parent_collections as $key => $value): ?>
            <li><?php print $value['label_link'] ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
  </div>
  </div>
  <fieldset class="collapsible collapsed islandora-basic-image-metadata">
  <legend><span class="fieldset-legend"><?php print t('Extended details'); ?></span></legend>
    <div class="fieldset-wrapper">
      <dl class="islandora-inline-metadata islandora-basic-image-fields">
        <?php $row_field = 0; ?>
        <?php foreach($dc_array as $key => $value): ?>
          <dt class="<?php print $value['class']; ?><?php print $row_field == 0 ? ' first' : ''; ?>">
            <?php print $value['label']; ?>
          </dt>
          <dd class="<?php print $value['class']; ?><?php print $row_field == 0 ? ' first' : ''; ?>">
            <?php print $value['value']; ?>
          </dd>
          <?php $row_field++; ?>
        <?php endforeach; ?>
      </dl>
    </div>
  </fieldset>
</div>