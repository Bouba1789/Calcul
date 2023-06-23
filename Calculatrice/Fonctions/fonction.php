<?php

    // Fonction pour calculer l'expression mathématique en utilisant eval()
function calculateExpression($expression)
{
    // Supprimer les espaces
    $expression = str_replace(' ', '', $expression);

    // Ajouter une multiplication implicite avec les parenthèses
    while (preg_match('/(\d+)\(/', $expression)) {
        $expression = preg_replace('/(\d+)\(/', '$1*(', $expression);
    }

    // Vérifier les parenthèses équilibrées
    if (!balancedParentheses($expression)) {
        return false;
    }

    // Vérifier le format de l'expression
    if (!isValidFormat($expression)) {
        return false;
    }

    // Évaluer l'expression mathématique en utilisant eval()
    eval("\$result = $expression;");
    return $result;
}

// Fonction pour vérifier si les parenthèses sont équilibrées
function balancedParentheses($expression)
{
    $stack = [];
    $openParentheses = ['(', '[', '{'];
    $closeParentheses = [')', ']', '}'];

    foreach (str_split($expression) as $char) {
        if (in_array($char, $openParentheses)) {
            $stack[] = $char;
        } elseif (in_array($char, $closeParentheses)) {
            $last = array_pop($stack);
            if (!$last || array_search($last, $openParentheses) !== array_search($char, $closeParentheses)) {
                return false;
            }
        }
    }

    return count($stack) === 0; // Vérifier si toutes les parenthèses ont été fermées
}

// Fonction pour vérifier le format de l'expression
function isValidFormat($expression)
{
    $operators = ['+', '-', '*', '/', ''];
    $length = strlen($expression);

    for ($i = 0; $i < $length - 1; $i++) {
        $currentChar = $expression[$i];
        $nextChar = $expression[$i + 1];

        if (in_array($currentChar, $operators) && in_array($nextChar, $operators)) {
            return false;
        }
    }

    return true;
}
