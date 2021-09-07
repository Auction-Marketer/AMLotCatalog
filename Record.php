<?php

namespace AM\LotCatalog;

abstract class Record {
    public function __toJSON() {
        return json_encode( (array) $this );
    }

    public function __get($property) {
        if (property_exists($this, '_' . $property)) {
            return $this->{ '_' . $property };
        }
    }

    public function __isset($property) {
        if (property_exists($this, '_' . $property)) {
            return isset($this->{'_' . $property});
        }
    }
}