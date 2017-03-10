<?php
/**
 * Cette class à pour unique but de montrer au moins un exemple d'utilisation d'un filtre fait par mes soins.
 *
 * @author LEBOC Philippe.
 * Date: 12/12/2016
 * Time: 21:38
 */
namespace sil13\VitrineBundle\Twig;

class TextLengthTrucationFilterExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('TextLengthTrucation', array($this, 'filter')),
        );
    }

    public function filter($text, $maxLength = 134, $endText = '...')
    {
        if(!empty($text) && strlen($text) > $maxLength) {
            $text = substr($text, 0, $maxLength);
            while($text[$maxLength-1] === '\'') $text = substr($text, 0, $maxLength-2);
            return substr($text, 0, $maxLength) . $endText;
        }

        return $text;
    }

    public function getName()
    {
        return 'app_extension';
    }
}