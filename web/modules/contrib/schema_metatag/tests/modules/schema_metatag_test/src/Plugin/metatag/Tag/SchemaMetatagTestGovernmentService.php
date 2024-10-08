<?php

namespace Drupal\schema_metatag_test\Plugin\metatag\Tag;

use Drupal\schema_metatag\Plugin\metatag\Tag\SchemaNameBase;

/**
 * A metatag tag for testing.
 *
 * @MetatagTag(
 *   id = "schema_metatag_test_government_service",
 *   label = @Translation("Schema Metatag Test Government Service"),
 *   name = "governmentService",
 *   description = @Translation("Test element"),
 *   group = "schema_metatag_test_group",
 *   weight = 0,
 *   type = "label",
 *   secure = FALSE,
 *   multiple = TRUE,
 *   property_type = "government_service",
 *   tree_parent = {
 *     "GovernmentService",
 *   },
 *   tree_depth = -1,
 * )
 */
class SchemaMetatagTestGovernmentService extends SchemaNameBase {

}
