<?php

/*! @ingroup StructWSFPHPAPIFramework Framework of the structWSF PHP API library */
//@{

/*! @file \StructuredDynamics\structwsf\framework\Namespaces.php
    @brief  List of main ontologies used
 */

namespace StructuredDynamics\structwsf\framework;

/**
* List of main ontologies used 
* These are a list of static variables. This is used to get the URI of the ontologies from 
* anywhere in the code. Instead of writing the URi, we use these variables.
* 
* @author Frederick Giasson, Structured Dynamics LLC.
*/
class Namespaces
{
  public static $address = "http://schemas.talis.com/2005/address/schema#";
  public static $asn = "http://purl.org/ASN/schema/core/";
  public static $bibo = "http://purl.org/ontology/bibo/";
  public static $bio = "http://purl.org/vocab/bio/0.1/";
  public static $bkn = "http://purl.org/ontology/bkn#";
  public static $bkn_temp = "http://purl.org/ontology/bkn/temp#";
  public static $bkn_base = "http://purl.org/ontology/bkn/base/";
  public static $cc = "http://creativecommons.org/ns#";
  public static $cyc = "http://sw.cyc.com/2006/07/27/cyc/";
  public static $dc = "http://purl.org/dc/elements/1.1/";
  public static $dcam = "http://purl.org/dc/dcam/";
  public static $dcterms = "http://purl.org/dc/terms/";
  public static $dctype = "http://purl.org/dc/dcmitype/";
  public static $doap = "http://usefulinc.com/ns/doap#";
  public static $eor = "http://dublincore.org/2000/03/13/eor#";
  public static $event = "http://purl.org/NET/c4dm/event.owl#";
  public static $foaf = "http://xmlns.com/foaf/0.1/";
  public static $frbr = "http://purl.org/vocab/frbr/core#";
  public static $geo = "http://www.w3.org/2003/01/geo/wgs84_pos#";
  public static $geonames = "http://www.geonames.org/ontology#";
  public static $gem = "http://purl.org/gem/elements/";
  public static $gemq = "http://purl.org/gem/qualifiers/";
  public static $iron = "http://purl.org/ontology/iron#";
  public static $loc = "http://www.loc.gov/loc.terms/relators/";
  public static $mo = "http://purl.org/ontology/mo/";
  public static $owl = "http://www.w3.org/2002/07/owl#";
  public static $po = "http://purl.org/ontology/po/";
  public static $rdf = "http://www.w3.org/1999/02/22-rdf-syntax-ns#";
  public static $rdfs = "http://www.w3.org/2000/01/rdf-schema#";
  public static $rss = "http://purl.org/rss/1.0/";
  public static $sioc = "http://rdfs.org/sioc/ns#";
  public static $skos_2004 = "http://www.w3.org/2004/02/skos/core#";
  public static $skos_2008 = "http://www.w3.org/2008/05/skos#";
  public static $umbel = "http://umbel.org/umbel#";
  public static $umbel_ac = "http://umbel.org/umbel/ac/";
  public static $umbel_sc = "http://umbel.org/umbel/sc/";
  public static $umbel_rc = "http://umbel.org/umbel/rc/";
  public static $geoname = "http://www.geonames.org/ontology#";
  public static $peg = "http://purl.org/ontology/peg#";
  public static $muni = "http://purl.org/ontology/muni#";
  public static $dbpedia_ont = "http://dbpedia.org/ontology/";
  public static $sco = "http://purl.org/ontology/sco#";
  public static $void = "http://rdfs.org/ns/void#";
  public static $wsf = "http://purl.org/ontology/wsf#";
  public static $aggr = "http://purl.org/ontology/aggregate#";
  public static $xsd = "http://www.w3.org/2001/XMLSchema#";

  /**
  * Get the list of all properties's URI normally used to refer
  * to a label for a record
  * 
  * @author Frederick Giasson, Structured Dynamics LLC.
  */
  public static function getLabelProperties()
  {
    return(array(
        Namespaces::$iron . "prefLabel",
        Namespaces::$iron . "altLabel",
        Namespaces::$dcterms . "title",
        Namespaces::$dc . "title",
        Namespaces::$doap . "name",
        Namespaces::$foaf . "name",
        Namespaces::$foaf . "givenName",
        Namespaces::$foaf . "family_name",
        Namespaces::$rdfs . "label",
        Namespaces::$skos_2004 . "prefLabel",
        Namespaces::$skos_2004 . "altLabel",
        Namespaces::$skos_2008 . "prefLabel",
        Namespaces::$skos_2008 . "altLabel",
        Namespaces::$geoname."name"));
  }  
          
  /**
  * Get the list of all properties's URI normally used to refer
  * to a description for a record
  * 
  * @author Frederick Giasson, Structured Dynamics LLC.
  */          
  public static function getDescriptionProperties()
  {
    return(array(
      Namespaces::$iron . "description",
      Namespaces::$dcterms . "description",
      Namespaces::$skos_2004 . "definition",
      Namespaces::$skos_2008 . "definition",
      Namespaces::$bio . "olb",
      Namespaces::$bibo . "abstract",
      Namespaces::$doap . "description",
      Namespaces::$geoname."name"
    ));    
  }  
  
  /**
  * Get the prefixed version of a URI. 
  * For example, "http://xmlns.com/foaf/0.1/Person" would become "foaf:Person"
  * 
  * @param mixed $uri URI to prefixize
  * 
  * @author Frederick Giasson, Structured Dynamics LLC.
  */
  public static function getPrefixedUri($uri)
  {
    // Find the base URI of the ontology
    $pos = strripos($uri, "#");

    if ($pos === FALSE)
    {
      $pos = strripos($uri, "/");
    }

    if ($pos !== FALSE)
    {
      $pos++;
    }

    // Save the URI of the ontology
    $onto = substr($uri, 0, $pos);

    // Save the URI of the class or property passed in parameter
    $resource = substr($uri, $pos, strlen($uri) - $pos);    
  
    foreach(get_class_vars('\StructuredDynamics\structwsf\framework\Namespaces') as $prefix => $u)    
    {    
      if($onto == Namespaces::$$prefix)
      {
        return($prefix.":".$resource);
      }
    }
    
    return($uri);
  }
}

//@}

?>