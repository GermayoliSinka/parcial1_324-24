WITH UsuariosPorImpuesto AS (
    SELECT 
        u.ci,
        u.nombre,
        u.paterno,
        u.materno,
        u.celular,
        u.email,
        LEFT(p.cod_catastro, 1) AS tipo_impuesto
    FROM 
        usuario u
    LEFT JOIN 
        propiedad p ON u.ci = p.ci_propietario
    WHERE 
        p.cod_catastro IS NOT NULL
),
NombresPorGrupo AS (
    SELECT 
        nombre + ' ' + paterno + ' ' + ISNULL(materno, '') AS nombre_completo,
        CASE 
            WHEN tipo_impuesto = '1' THEN 'alto'
            WHEN tipo_impuesto = '2' THEN 'medio'
            WHEN tipo_impuesto = '3' THEN 'bajo'
        END AS grupo
    FROM 
        UsuariosPorImpuesto
)

SELECT 
    ISNULL([alto], '') AS alto,
    ISNULL([medio], '') AS medio,
    ISNULL([bajo], '') AS bajo
FROM (
    SELECT 
        nombre_completo,
        grupo,
        ROW_NUMBER() OVER (PARTITION BY grupo ORDER BY nombre_completo) AS rn
    FROM 
        NombresPorGrupo
) AS SourceTable
PIVOT (
    MAX(nombre_completo) 
    FOR grupo IN ([alto], [medio], [bajo])
) AS PivotTable
WHERE 
    [alto] IS NOT NULL OR 
    [medio] IS NOT NULL OR 
    [bajo] IS NOT NULL;
