<?php

namespace App\Exporter;

class CSVExporter implements Exporter
{

    private Translator $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function export($data)
    {
        return 'exporting '.$data.' in csv';
    }
}
