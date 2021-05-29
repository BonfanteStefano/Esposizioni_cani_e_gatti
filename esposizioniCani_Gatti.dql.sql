    USE esposizioni_cani_e_gatti;

    -- Query che ritorna le informazioni sui concorsi a cui partecipa il gatto identificato dal codice 1
    SELECT C.IdConcorso, C.descrizione, C.categoria, C.luogo, c.data
    FROM concorso as C INNER JOIN iscrizioneGatto as IG ON C.IdConcorso = IG.concorso
    WHERE IG.gatto = 1;

    -- Query che ritorna le informazioni dei concorsi a cui partecipa il gatto "Fulmine";
    SELECT C.IdConcorso, C.descrizione, C.categoria, C.luogo, c.data
    FROM concorso AS C INNER JOIN iscrizioneGatto AS IG ON C.IdConcorso = IG.concorso INNER JOIN gatto as G ON IG.gatto = G.IdGatto
    WHERE G.nome = "Fulmine";