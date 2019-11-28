import { __ } from "@wordpress/i18n";
import {
  TimePicker,
  CheckboxControl,
  TextControl,
  RangeControl
} from "@wordpress/components";

export default props => {
  const {
    attributes: {
      nr,
      endZeit,
      startZeit,
      preis,
      beschraenkt,
      maxPlaetze,
      character
    },
    className,
    setAttributes
  } = props;

  return (
    <div className={className}>
      <RangeControl
        label="Ausflug Nummer"
        value={nr}
        onChange={nr => setAttributes({ nr })}
        min={1}
        max={100}
      />
      <TextControl
        label={"Character"}
        value={character}
        onChange={character => setAttributes({ character })}
      />
      <label htmlFor="startZeitPicker">Start Zeit</label>
      <TimePicker
        id="startZeitPicker"
        currentTime={startZeit}
        onChange={newDate => setAttributes({ startZeit: newDate })}
        is12Hour={false}
      />
      <label htmlFor="endZeitPicker">End Zeit</label>
      <TimePicker
        id="endZeitPicker"
        currentTime={endZeit}
        onChange={newDate => setAttributes({ endZeit: newDate })}
        is12Hour={false}
      />
      <TextControl
        label={"Preis"}
        value={preis}
        onChange={preis => setAttributes({ preis })}
      />
      <CheckboxControl
        heading="Beschränkte Anzahl an Teilnehmern"
        checked={beschraenkt}
        onChange={beschraenkt => setAttributes({ beschraenkt })}
      />
      {beschraenkt && (
        <RangeControl
          label="Maximale anzahl Mitglieder"
          value={maxPlaetze}
          onChange={maxPlaetze => setAttributes({ maxPlaetze })}
          min={1}
          max={200}
        />
      )}
    </div>
  );
};
